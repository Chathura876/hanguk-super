<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        try {
            $user=Auth::user();
            $admins=Admin::all();
            return view('owner.sidebar_pages.people.admin.admin_list',compact('admins','user'));
        }
        catch (\Exception $exception){
            return $exception;
        }

    }

    public function create(){
        $user=Auth::user();
        return view('owner.sidebar_pages.people.admin.add_admin',compact('user'));
    }

    public function store(Request $request)
    {
        // Define validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:admins,email',
            'password' => 'required|string|min:6',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('admin.add')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $admin = new Admin();
            $admin->name = $request->name;
            $admin->phone = $request->phone;
            $admin->email = $request->email;
            $admin->password = bcrypt($request->password);

            // Handle file upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public', $filename);
                $admin->image = $filename;
            }

            $admin->save();

            return redirect()->route('admin.index');
        } catch (\Exception $exception) {
            return redirect()->route('admin.create')
                ->withErrors(['error' => 'An error occurred while adding the admin.'])
                ->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $admin=Admin::query()
                ->where('id',$id)
                ->first();
            $user=Auth::user();
            return view('owner.sidebar_pages.people.admin.edit_admin',compact('admin','user'));
        }
        catch (\Exception $exception){
            return $exception;
        }
    }


    public function update(Request $request, $id)
    {
        // Define validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'password' => 'string|min:6',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('admin.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $admin = Admin::findOrFail($id);
            $admin->name = $request->name;
            $admin->phone = $request->phone;
            $admin->email = $request->email;
            $admin->password = $request->password ? bcrypt($request->password) : $admin->password;

            // Handle file upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($admin->image && file_exists(storage_path('app/public/' . $admin->image))) {
                    unlink(storage_path('app/public/' . $admin->image));
                }
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public', $filename);
                $admin->image = $filename;
            }

            $admin->save();

            return redirect()->route('admin.index');
        } catch (\Exception $exception) {
            return redirect()->route('admin.edit', $id)
                ->withErrors(['error' => 'An error occurred while updating the admin.'])
                ->withInput();
        }
    }

    public function delete($id)
    {
        try {
            Admin::query()
                ->where('id',$id)
                ->delete();

            return redirect()->route('admin.index');
        }
        catch (\Exception $exception){
            return $exception;
        }
    }
}
