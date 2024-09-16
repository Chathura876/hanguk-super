<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ImageController;
use App\Http\Controllers\Imageuploader;
use App\Models\Admin;
use App\Models\Owner;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user=Auth::user();

        return view('owner.index',compact('user'));
    }

    public function create(Request $request)
    {
//        $imageController = new Imageuploader();
//        $imagePath = $imageController->imgUpload($request->img, 'owner_image_', 'owners');
        try {
            Owner::query()->create([
                'first_name'=>'admin',
                'second_name'=>'admin',
                'user_name'=>'admin',
                'nic'=>'2000',
                'email'=>'admin',
                'add_by'=>'admin',
                'password'=>Hash::make(123),
                '$referral_no='=>'123212',
                'img'=>'admin'
           ]);
//            Owner::query()->create([
//                'first_name'=>$request->first_name,
//                'second_name'=>$request->second_name,
//                'user_name'=>$request->user_name,
//                'nic'=>$request->nic,
//                'email'=>$request->email,
//                'add_by'=>$request->add_by,
//                'password'=>Hash::make($request->password),
//                '$referral_no='=>$request->referral_no,
//                'IMG'=>$imagePath
//           ]);

            return response()->json('success',200);
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function login()
    {
        return view('owner.owner_login');
    }

    public function login_check(Request $request)
    {

        // Validate request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        try {
            // Log request data for debugging
            Log::info('Login attempt for email: ' . $request->email);

            $owner = Owner::query()
                ->where('email', $request->email)
                ->first();


            if ($owner && Hash::check($request->password, $owner->password)) {

                Auth::guard('owner')->login($owner);

                // Log successful login
                Log::info('Login successful for email: ' . $request->email);

                return redirect()->route('owner.dashboard');
            } else {

                Log::warning('Login failed for email: ' . $request->email);

                return redirect()->route('login')->with('error', 'Invalid credentials');
            }
        } catch (\Exception $e) {
            // Log exception
            Log::error('Login error: ' . $e->getMessage());

            return redirect()->route('login')->with('error', 'An error occurred. Please try again.');
        }
    }

    //expenses

    public function add_expenses()
    {
        return view('owner.sidebar_pages.expenses.add_expenses');
    }

    public function edit_expenses()
    {
        return view('owner.sidebar_pages.expenses.edit_expenses');
    }

    public function expenses_list()
    {
        return view('owner.sidebar_pages.expenses.expenses_list');
    }

    public function report()
    {
        return view('owner.sidebar_pages.expenses.expenses_report');
    }

    //sale

    public function profit()
    {
        return view('owner.sidebar_pages.sale.profit');
    }

    public function return_items()
    {
        return view('owner.sidebar_pages.sale.return_items');
    }

    //people
   public function profile()
    {
        return view('owner.sidebar_pages.people.admin.profile');
    }


    public function receipt()
    {
        return view('owner.receipt.receipt');
    }

    public function issued_bills()
    {
        return view('owner.receipt.issued_bills');
    }

    public function sale()
    {
        return view('owner.sidebar_pages.sale.sale');
    }

    public function customer_list()
    {
        return view('owner.sidebar_pages.people.customer.customer_list');
    }
}
