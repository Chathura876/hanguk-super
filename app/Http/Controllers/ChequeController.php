<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChequeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('owner.sidebar_pages.cheque.cheque_list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('owner.sidebar_pages.cheque.add_cheque');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        return view('owner.sidebar_pages.cheque.view_cheque');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
        return view('owner.sidebar_pages.cheque.edit_cheque');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
