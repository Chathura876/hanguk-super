<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\GrnBill;
use App\Models\GrnBillItem;
use App\Models\Order;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Grn_Controller extends Controller
{
    public function index ()
    {
        $user = Auth::user();
        $grnBill = GrnBill::orderBy('created_at', 'desc')->get();

        return view('owner.sidebar_pages.GRN.grn', compact('grnBill', 'user'));

    }

    public function grn_save(Request $request)
    {
        try {
            DB::beginTransaction();
            $grn=GrnBill::query()
                ->create([
                    'total'=>$request->total,
                    'net_total'=>$request->net_total,
                    'discount'=>$request->discount,
                    'balance'=>$request->balance,
                    'company_name'=>$request->company_name,
                    'date'=>$request->date,
                    'payment_type'=>$request->payment_type,
                    'add_by'=>$request->add_by
                ]);

               $this->grnBillItemSave($request->grn_bill_item, $grn->id);
               DB::commit();
             return response()->json('data added successfully');
        }
        catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    public function grnBillItemSave($request, $id)
    {
        try {
            foreach ($request as $item) {
                GrnBillItem::query()
                    ->create([
                        'grn_id'=>$id,
                        'item_id'=>$item->item_id,
                        'product_name'=>$item->product_name,
                        'stock_price'=>$item->stock_price,
                        'selling_price'=>$item->selling_price,
                        'discount_price'=>$item->discount_price,
                        'qty'=>$item->qty,
                        'free_item'=>$item->free_item,
                        'sub_total'=>$item->sub_total
                    ]);
            }

            return response()->json('Data added successfully', 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateStock($item_id,$qty,$stock_price,)
    {
        try {
            $oldStockCount=Stock::query()
                ->where('id',$item_id)
                ->get();
            
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



}
