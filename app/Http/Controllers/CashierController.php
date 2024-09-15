<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cashier;
use Illuminate\Http\Request;
use Modules\SuperMarketPos\Entities\Customer;
use Modules\SuperMarketPos\Entities\Product;
use PHPUnit\Exception;

class CashierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        try {

            $search = $request->input('search');

            if ($search === null) {
                $cashier = Cashier::all();
            } else {

                $cashier = Cashier::query()
                    ->where('name', 'like', '%' . $search . '%')
                    ->orWhere('NIC_no', 'like', '%' . $search . '%')
                    ->get();
            }
            return view('supermarketpos::owner.sidebar_pages.people.cashier.cashier_list',compact('cashier'));
        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supermarketpos::owner.sidebar_pages.people.cashier.add_cashier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Cashier::query()->create([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'address'=>$request->address,
                'NIC_no'=>$request->NIC_no,
                'phone_no'=>$request->phone_no,
                'whatsapp_no'=>$request->whatsapp_no,
                'IMG'=>$request->img,
                'username'=>$request->username,
                'password'=>$request->password
            ]);
            return redirect()->back()->with('success', 'Cashier added successfully.');
        }
        catch (Exception $exception){
            return  $exception;
        }

//        $cashier->username = $request->username;
//        $cashier->password = bcrypt($request->password);
//        $cashier->save();

//        return redirect()->route('cashiers.index')->with('success', 'Cashier added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $cashier=Cashier::query()
                ->where('id',$id)
                ->first();
            return response()->json($cashier);
        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cashier = Cashier::find($id);

        if (!$cashier) {
            return redirect()->back()->with('error', 'Cashier not found.');
        }

        return view('supermarketpos::owner.sidebar_pages.people.cashier.edit_cashier', compact('cashier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try {
            Cashier::query()
                ->where('id',$id)
                ->update([
                    'first_name'=>$request->first_name,
                    'last_name'=>$request->last_name,
                    'address'=>$request->address,
                    'NIC_no'=>$request->NIC_no,
                    'phone_no'=>$request->phone_no,
                    'whatsapp_no'=>$request->whatsapp_no,
                    'IMG'=>$request->img,
                    'username'=>$request->username,
                    'password'=>$request->password
                ]);
            return response()->json('updated');
        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Cashier::query()
                ->where('id',$id)
                ->delete();
            return redirect()->back()->with('delete');
        }
        catch (\Exception $exception){
            return $exception;
        }
    }
}
