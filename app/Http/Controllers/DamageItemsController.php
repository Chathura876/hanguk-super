<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DamageItemsController extends Controller
{
    //
    public function index()
    {
        // Code for displaying a list of resources
        return view('owner.sidebar_pages.damage_items.damage_items_list');
    }

    public function create()
    {
        // Code for showing a form to create a new resource
        return view('owner.sidebar_pages.damage_items.add_damage_items');
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
        // Code for showing a form to edit a resource
        return view('owner.sidebar_pages.damage_items.edit_damage_items');
    }

    public function report()
    {
        // Code for updating a resource
        return view('owner.sidebar_pages.damage_items.damage_items_report');
    }

    public function destroy($id)
    {
        // Code for deleting a resource
    }
}
