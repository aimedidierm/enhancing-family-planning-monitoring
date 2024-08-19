<?php

namespace App\Http\Controllers;

use App\Models\Contraceptive;
use Illuminate\Http\Request;

class ContraceptiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contraceptive');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contraceptive $contraceptive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contraceptive $contraceptive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contraceptive $contraceptive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contraceptive $contraceptive)
    {
        //
    }
}
