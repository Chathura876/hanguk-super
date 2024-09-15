<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        try {

            $managers=Manager::all();

            return view('supermarketpos::owner.sidebar_pages.people.manager.manager_list',compact('managers'));

        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    public function create()
    {
        return view('supermarketpos::owner.sidebar_pages.people.manager.add_manager');
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
            $manager = Manager::query()
                ->where('id',$id)
                ->first();

            return view('owner.sidebar_pages.people.manager.edit_manager',compact('manager'));
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
