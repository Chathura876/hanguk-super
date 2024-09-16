<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cashier;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
            $user=Auth::user();
            $search = $request->input('search');

            if ($search === null) {
                $cashier = Cashier::all();
            } else {

                $cashier = Cashier::query()
                    ->where('name', 'like', '%' . $search . '%')
                    ->orWhere('NIC_no', 'like', '%' . $search . '%')
                    ->get();
            }
            return view('owner.sidebar_pages.people.cashier.cashier_list',
                compact('cashier','user'));
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
        $user=Auth::user();
        return view('owner.sidebar_pages.people.cashier.add_cashier',compact('user'));
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
                'IMG'=>0,
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
        $user=Auth::user();
        if (!$cashier) {
            return redirect()->back()->with('error', 'Cashier not found.');
        }

        return view('owner.sidebar_pages.people.cashier.edit_cashier', compact('cashier','user'));
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
                    'IMG'=>0,
                    'username'=>$request->username,
                    'password'=>$request->password
                ]);
            return redirect()->route('owner-cashier-index')->with('success', 'Cashier updated successfully.');
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

    public function login()
    {
        return view('cashier.cashier_login');
    }
    public function login_check(Request $request)
    {
        // Validate request data
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        try {
            // Log request data for debugging
            Log::info('Login attempt for email: ' . $request->email);

            // Fetch cashier record based on username
            $cashier = Cashier::where('username', $request->email)->first();

            // Check if cashier exists and password matches
            if ($cashier && Hash::check($request->password, $cashier->password)) {
                // Log the cashier in using the cashier guard
                Auth::guard('cashier')->login($cashier);

                // Log successful login
                Log::info('Login successful for email: ' . $request->email);

                return redirect()->route('pos.dashboard'); // Redirect to cashier's dashboard
            } else {
                // Log failed login attempt
                Log::warning('Login failed for email: ' . $request->email);

                return redirect()->route('cashier.login')->with('error', 'Invalid credentials');
            }
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Login error: ' . $e->getMessage());

            return redirect()->route('cashier.login')->with('error', 'An error occurred. Please try again.');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('cashier.login');
    }
}
