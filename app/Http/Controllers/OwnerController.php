<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ImageController;
use App\Http\Controllers\Imageuploader;
use App\Models\Admin;
use App\Models\Expense;
use App\Models\Order;
use App\Models\Owner;
use App\Models\Product;
use App\Models\Stock;
use Carbon\Carbon;
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
        $user = Auth::user();
        return view('owner.index', compact('user'));
    }

    public function create(Request $request)
    {
//        $imageController = new Imageuploader();
//        $imagePath = $imageController->imgUpload($request->img, 'owner_image_', 'owners');
        try {
//            Owner::query()->create([
//                'first_name'=>'admin',
//                'second_name'=>'admin',
//                'user_name'=>'admin',
//                'nic'=>'2000',
//                'email'=>'admin',
//                'add_by'=>'admin',
//                'password'=>Hash::make(123),
//                '$referral_no='=>'123212',
//                'img'=>'admin'
//           ]);
            Owner::query()->create([
                'first_name' => $request->first_name,
                'second_name' => $request->second_name,
                'user_name' => $request->user_name,
                'nic' => $request->nic,
                'email' => $request->email,
                'add_by' => $request->add_by,
                'password' => Hash::make($request->password),
                '$referral_no=' => $request->referral_no,
                'img' => 'img'
            ]);

            return response()->json('success', 200);
        } catch (\Exception $e) {
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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    //expenses

    public function add_expenses()
    {
        $user = Auth::user();
        return view('owner.sidebar_pages.expenses.add_expenses', compact('user'));
    }

    public function store_expenses(Request $request)
    {

        try {
            // Validate the request data
            $request->validate([
                'date' => 'required|date',
                'details' => 'required|string',
                'type' => 'required|string',
//                'addBy' => 'required|string',
                'amount' => 'required|numeric',
            ]);


            // Create a new expense record
            Expense::query()->create([
                'date' => $request->date,
                'details' => $request->details,
                'type' => $request->type,
                'addBy' => 'owner',
                'amount' => $request->amount,
            ]);

            // Redirect with a success message
            return redirect()->route('owner.expenses_list')->with('success', 'Expense added successfully.');
        } catch (\Exception $exception) {
            // Redirect back with an error message if something goes wrong
            return redirect()->back()->with('error', 'An error occurred: ' . $exception->getMessage());
        }
    }

    public function edit_expenses($id)
    {
        try {
            // Find the specific expense by ID
            $expense = Expense::findOrFail($id);
            $user = Auth::user();
            return view('owner.sidebar_pages.expenses.edit_expenses', compact('user', 'expense'));
        } catch (\Exception $exception) {
            // Handle error if the expense is not found or any other issue
            return redirect()->route('owner.expenses_list')->with('error', 'Expense not found: ' . $exception->getMessage());
        }
    }

    public function update_expenses(Request $request, $id)
    {
        try {
            // Validate the request data
            $request->validate([
                'date' => 'required|date',
                'details' => 'required|string',
                'type' => 'required|string',
//                'addBy' => 'required|string',
                'amount' => 'required|numeric',
            ]);

            // Find the expense record by ID
            $expense = Expense::findOrFail($id);

            // Update the expense record
            $expense->update([
                'date' => $request->date,
                'details' => $request->details,
                'type' => $request->type,
                'addBy' => 'owner',
                'amount' => $request->amount,
            ]);

            // Redirect with a success message
            return redirect()->route('owner.expenses_list')->with('success', 'Expense updated successfully.');
        } catch (\Exception $exception) {
            // Redirect back with an error message if something goes wrong
            return redirect()->back()->with('error', 'An error occurred: ' . $exception->getMessage());
        }
    }

    public function expenses_list()
    {
        $user = Auth::user();
        $expenses = Expense::all();
        // Today's expenses
        $todayExpenses = Expense::whereDate('date', Carbon::today())->sum('amount');

        // Previous week expenses
        $previousWeekExpenses = Expense::whereBetween('date', [
            Carbon::now()->subDays(7), Carbon::today()
        ])->sum('amount');

        // Expenses to the current date (from the start of the month to today)
        $currentMonthExpenses = Expense::whereMonth('date', Carbon::now()->month)->sum('amount');

        // July total expenses (replace '7' with the appropriate month)
        $julyExpenses = Expense::whereMonth('date', 7)->sum('amount');

        return view('owner.sidebar_pages.expenses.expenses_list', compact(
            'user', 'todayExpenses', 'previousWeekExpenses', 'currentMonthExpenses', 'julyExpenses', 'expenses'
        ));
    }

    public function destroy_expenses($id)
    {
        // Find the expense by ID
        $expense = Expense::findOrFail($id);

        // Delete the expense
        $expense->delete();

        // Redirect back with a success message
        return redirect()->route('owner.expenses_list')->with('success', 'Expense deleted successfully.');
    }

    public function report()
    {
        $user = Auth::user();
        return view('owner.sidebar_pages.expenses.expenses_report', compact('user'));
    }

//sale

    public function profit()
    {
        $user = Auth::user();
        return view('owner.sidebar_pages.sale.profit', compact('user'));
    }

    public function return_items()
    {
        $user = Auth::user();
        return view('owner.sidebar_pages.sale.return_items', compact('user'));
    }

//people
    public function profile()
    {
        $user = Auth::user();
        return view('owner.sidebar_pages.people.admin.profile', compact('user'));
    }


    public function receipt()
    {
        return view('owner.receipt.receipt');
    }

    public function issued_bills()
    {
        $user = Auth::user();
        $bill = Order::all();
        return view('owner.receipt.issued_bills', compact('bill', 'user'));
    }

    public function sale()
    {
        $user = Auth::user();
        return view('owner.sidebar_pages.sale.sale', compact('user'));
    }

    public function customer_list()
    {
        $user = Auth::user();
        return view('owner.sidebar_pages.people.customer.customer_list', compact('user'));
    }
}
