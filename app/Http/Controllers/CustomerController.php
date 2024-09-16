<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CustomerController extends Controller
{
    public function index(Request $request){
        try {
            $user=Auth::user();
            $search = $request->input('search');

            if ($search === null) {
                $customers = Customer::paginate(15);
            } else {
                $customers = Customer::query()
                    ->where('nic', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%')
                    ->paginate(15);
            }

            return view('owner.sidebar_pages.people.customer.customer_list',compact('customers','user'));
        }
        catch (\Exception $exception){
            return $exception;
        }

    }

    public function create()
    {
        $user=Auth::user();
        return view('owner.sidebar_pages.people.customer.add_customer',compact('user'));
    }
    public function store(Request $request)
    {
//        dd($request->all());
        // Validate the input data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'nic' => 'required|string|max:12|unique:customers,nic',
            'email' => 'required|email|max:255|unique:customers,email',
            'b_day' => 'required|date',
            'phone_number' => 'required|string|max:15',
            // Add validation rules for other fields if necessary
        ]);

        try {
            // Create the customer
            Customer::query()-> create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'user_name' => $request->user_name ?? null, // Handle null if not present
                'nic' => $request->nic,
                'email' => $request->email,
                'birthday' => $request->b_day,
                'phone' => $request->phone_number,
                'shop_id' =>1, // Default value if not present
                'card_no' => $request->card_no ?? null, // Handle null if not present
                'type' => $request->type ?? 'regular', // Default value if not present
                // 'status' => 1 // Uncomment if you want to set a default status
            ]);

            // Redirect to the customer index page with a success message
            return redirect()->route('customer.index')->with('success', 'Customer added successfully.');
        } catch (\Exception $exception) {
            // Redirect back with the error message
            return redirect()->back()->with('error', 'Failed to add customer: ' . $exception->getMessage());
        }
    }


    public function edit($id)
    {
        try {
            $user=Auth::user();
            $customer=Customer::query()
                ->where('id',$id)
                ->first();
            return view('owner.sidebar_pages.people.customer.edit_customer',compact('customer','user'));
        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    public function update(Request $request,$id)
    {
        try {
            Customer::query()
                ->where('id',$id)
                ->update([
                    'first_name'=>$request->first_name,
                    'last_name'=>$request->last_name,
                    'user_name'=>$request->user_name,
                    'nic'=>$request->nic,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'birthday'=>$request->b_day,
                    'shop_id'=>1,
                    'card_no'=>$request->card_no,
                    'type'=>$request->type,
//                    'status'=>1
                ]);

            return redirect()->route('customer.index');
        }
        catch (\Exception $exception){
            return $exception;
        }
    }

//    public function show($id)
//    {
//        try {
//            $customer=Customer::query()
//                ->where('id',$id)
//                ->first();
//
//            return response()->json($customer);
//        }
//        catch (\Exception $exception){
//            return $exception;
//        }
//    }

    public function delete($id)
    {
        try {
            $customer = Customer::query()->findOrFail($id);
            $customer->delete();

            return redirect()->route('customer.index')->with('delete', 'Customer deleted successfully.');
        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    public function getMember(Request $request)
    {
        try {
            $memberID=$request->memberID;
            $member=Customer::query()
                ->where('phone',$memberID)
                ->first();

            return response()->json($member,200);
        }
        catch (\Exception $exception){
            return $exception;
        }
    }
}
