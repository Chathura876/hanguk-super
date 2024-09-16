<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cheque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChequeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $cheques = Cheque::all(); // Assuming you have a Cheque model to fetch data from the database
        return view('owner.sidebar_pages.cheque.cheque_list', compact('user', 'cheques'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=Auth::user();
        return view('owner.sidebar_pages.cheque.add_cheque',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // app/Http/Controllers/ChequeController.php

    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'number' => 'required|string|max:255',
            'bank' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'issued_date' => 'required|date',
            'written_date' => 'required|date',
            'collect_by' => 'nullable|string|max:255',
//            'status' => 'boolean'
        ]);

        Cheque::create([
            'number' => $request->number,
            'bank' => $request->bank,
            'company' => $request->company,
            'amount' => $request->amount,
            'issued_date' => $request->issued_date,
            'written_date' => $request->written_date,
            'collect_by' => $request->collect_by,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('cheque.index')->with('success', 'Cheque added successfully.');
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
        $user=Auth::user();
        $cheque = Cheque::findOrFail($id);
        return view('owner.sidebar_pages.cheque.edit_cheque',compact('user','cheque'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'number' => 'required|string|max:255',
            'bank' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'issued_date' => 'required|date',
            'written_date' => 'required|date',
            'collect_by' => 'nullable|string|max:255',
//            'status' => 'boolean'
        ]);

        $cheque = Cheque::findOrFail($id);
        $cheque->update([
            'number' => $request->number,
            'bank' => $request->bank,
            'company' => $request->company,
            'amount' => $request->amount,
            'issued_date' => $request->issued_date,
            'written_date' => $request->written_date,
            'collect_by' => $request->collect_by,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('cheque.index')->with('success', 'Cheque updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cheque = Cheque::findOrFail($id);
        $cheque->delete();

        return redirect()->route('cheque.index')->with('success', 'Cheque deleted successfully.');
    }

}
