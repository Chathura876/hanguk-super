<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Modules\SuperMarketPos\Entities\Order;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $search = $request->input('search');
            $user=Auth::user();
            if ($search === null) {
                $orders = Order::paginate(15);
            } else {
                $orders = Order::query()
                    ->where('id', 'like', '%' . $search . '%')
                    ->paginate(15);
            }

            return response()->json($orders);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function store(Request $request)
    {
        try {

            Order::query()->create([
                'net_total'=>$request->net_total,
                'shop_id'=>0,
                'customer_id'=>$request->customer_id,
                'type'=>$request->type,
                'date'=>$request->date,
                'return_amount'=>$request->return_amount,
                'discount_amount'=>$request->discount_amount,
                'update_by'=>$request->update_by,
                'add_by'=>$request->add_by
            ]);
            return response()->json('created');
        }
        catch (\Exception $exception){
            return $exception;
        }
    }
    public function show($id)
    {
        try {
            $order=Order::query()
                ->where('id',$id)
                ->first();
            return response()->json($order);
        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    public function update(Request $request,$id)
    {
        try {
            Order::query()
                ->where('id',$id)
                ->update([
                    'net_total'=>$request->net_total,
                    'shop_id'=>0,
                    'customer_id'=>$request->customer_id,
                    'type'=>$request->type,
                    'date'=>$request->date,
                    'return_amount'=>$request->return_amount,
                    'discount_amount'=>$request->discount_amount,
                    'update_by'=>$request->update_by,
                    'add_by'=>$request->add_by
                ]);

            return response()->json('updated');
        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    public function destroy(string $id)
    {
        try {
            Order::query()
                ->where('id',$id)
                ->delete();
            return response()->json('deleted');
        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    public function orderSubmit(Request $request)
    {

        // Start the transaction
        DB::beginTransaction();
        try {
            // Create the order
            $order_id = $this->orderCreate(
                $request->netTotal,
                $request->pay_amount,
                $request->balance,
                $request->customer_id,
                $request->return_amount,
                $request->discount_amount,
                $request->type
            );

            // Save order items
            $this->orderItemSave($order_id, $request->item);
            $this->returnItemSave($request->returnItem);

            // Commit the transaction
            DB::commit();
            return response()->json('success', 200);
        } catch (\Exception $exception) {
            // Rollback the transaction in case of error
            DB::rollBack();
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function orderCreate(
        $netTotal,
        $pay_amo,
        $balance,
        $customer_id,
        $return_amount,
        $discount_amount,
        $payment_type)
    {
        try {
            // Create the order
            $order = Order::create([
                'net_total' => $netTotal,
                'pay_amount' => $pay_amo,
                'balance' => $balance,
                'shop_id' => 0,
                'customer_id' => 0,  // Corrected to use $customer_id
                'type' => $payment_type,
                'date' => now(),
                'return_amount' => $return_amount,
                'discount_amount' => $discount_amount,
                'update_by' => 'cashier',
                'add_by' => 'cashier',
            ]);

            return $order->id;
        } catch (\Exception $exception) {
            throw $exception; // Throw exception to be caught in orderSubmit
        }
    }

    public function orderItemSave($orderID, $ItemList)
    {

        try {
            foreach ($ItemList as $item) {

                $product=Stock::query()
                    ->where('item_id',$item['item_id'])
                    ->first();
                $selling_price=$product->selling_price * $item['qty'];
                $stock_price=$product->stock_price * $item['qty'];
                $discount=$item['discount'] * $item['qty'];
                $profit = $selling_price-($stock_price+$discount);

                OrderItem::create([
                    'order_id' => $orderID,
                    'product_id' => $item['id'], // Accessing array keys
                    'stock_id' => $item['stock_id'],
                    'shop_id' => 0,
                    'quantity' => $item['qty'], // Accessing array keys
                    'date' => now(),
                    'price' => $item['selling_price'], // Accessing array keys
                    'discount_price' => $item['discount'], // Accessing array keys
                    'sub_total' => $item['subtotal'],
                    'profit' => $profit,
                    'free_item' => 0
                ]);

//                 If stock update logic is needed per item
                 $stock = new StockController;
                 $stock->stokeUpdateWithOrder($item['stock_id'], $item['qty']);
            }

            return 'success'; // Moved outside the loop to return success only after all items are processed

        } catch (\Exception $exception) {
            throw $exception; // Throw exception to be caught in orderSubmit
        }
    }

    public function returnItemSave($returnItem)
    {
        try {
            foreach ($returnItem as $item) {
                // Validate item data before processing
                if (!isset($item['id']) || !isset($item['qty'])) {
                    return response()->json(['error' => 'Invalid item data'], 400);
                }

                // Fetch stock for the current item
                $stock = Stock::query()->where('id', $item['id'])->first();

                // Check if stock exists
                if (!$stock) {
                    return response()->json(['error' => 'Stock not found for item ID: ' . $item['id']], 404);
                }

                // Calculate the new stock quantity
                $oldQty = $stock->qty;
                $returnQty = $item['qty'];

                // Ensure returnQty is valid (e.g., non-negative)
                if ($returnQty < 0) {
                    return response()->json(['error' => 'Invalid return quantity for item ID: ' . $item['id']], 400);
                }

                // Update stock quantity
                $newQty = $oldQty + $returnQty;
                $stock->update(['qty' => $newQty]);
            }

            return response()->json(['message' => 'Stock updated successfully'], 200);
        } catch (\Exception $exception) {
            // Log the exception for debugging
            \Log::error('Error in returnItemSave: ' . $exception->getMessage());

            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

}
