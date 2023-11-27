<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Waste;
use Illuminate\Support\Facades\Auth;

class WasteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'waste_name'=> 'required',
            'waste_type'=> 'required',
            'waste_qty'=> 'required',
            'pickup_coordinat'=> 'required',
        ]);
        $request['users_id'] = Auth::user()->id;
        $waste = Waste::create($request->all());
        return response()->json('try');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'waste_name'=> 'required',
            'waste_type'=> 'required',
            'waste_qty'=> 'required',
            'pickup_coordinat'=> 'required',
        ]);
        $waste = Waste::findOrFail($id);
        $waste->update($request->all());
        return response()->json('try update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $waste = Waste::findOrFail($id);
        $waste->delete();
        return response()->json('try delete');
    }
}
