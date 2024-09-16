<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function index()
    {
        try {

            $managers=Manager::all();
            $user=Auth::user();

            return view('supermarketpos::owner.sidebar_pages.people.manager.manager_list',compact('managers','user'));

        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    public function create()
    {
        $user=Auth::user();
        return view('supermarketpos::owner.sidebar_pages.people.manager.add_manager',compact('user'));
    }

    public function store(Request $request)
    {
        try {
            Manager::query()->create([

                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'nic_no'=>$request->nic_no,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'address'=>$request->address,
                'password'=>$request->password
            ]);
            return redirect()->route('manager.index');
        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    public function edit($id)
    {
        try {
            $user=Auth::user();
            $manager = Manager::query()
                ->where('id',$id)
                ->first();

            return view('owner.sidebar_pages.people.manager.edit_manager',compact('manager','user'));
        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    public function update(Request $request,$id)
    {
        try {
           Manager::query()
           ->where('id',$id)
           ->update([
               'first_name'=>$request->first_name,
               'last_name'=>$request->last_name,
               'nic_no'=>$request->nic_no,
               'phone'=>$request->phone,
               'email'=>$request->email,
               'address'=>$request->address,
               'password'=>$request->password
           ]);

            return redirect()->route('manager.index');
        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    public function delete($id)
    {
        try {
            Manager::query()
                ->where('id',$id)
                ->delete();

            return redirect()->route('manager.index');
        }
        catch (\Exception $exception){
            return $exception;
        }
    }


}
