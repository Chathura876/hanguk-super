<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DamageItemsController extends Controller
{
    //
    public function index()
    {
        $user=Auth::user();
        // Code for displaying a list of resources
        return view('owner.sidebar_pages.damage_items.damage_items_list',compact('user'));
    }

    public function create()
    {
        // Code for showing a form to create a new resource
        $user=Auth::user();
        return view('owner.sidebar_pages.damage_items.add_damage_items',compact('user'));
    }

//    public function store(Request $request)
//    {
//        // Code for storing a new resource
//    }

    public function show($id)
    {
        // Code for displaying a single resource
    }

    public function update()
    {
        $user=Auth::user();
        // Code for showing a form to edit a resource
        return view('owner.sidebar_pages.damage_items.edit_damage_items',compact('user'));
    }

    public function report()
    {
        // Code for updating a resource
        $user=Auth::user();
        return view('owner.sidebar_pages.damage_items.damage_items_report',compact('user'));
    }

    public function destroy($id)
    {
        // Code for deleting a resource
    }
}
