<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContraceptiveRequest;
use App\Models\Contraceptive;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContraceptiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        $methods = Contraceptive::all();
        $methods->load('patient');
        return view('contraceptive', compact('methods', 'patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContraceptiveRequest $request)
    {
        $patient = Patient::find($request->input('patient'));

        if (!$patient) {
            return redirect('/admin/contraceptive')->withErrors('Patient not found');
        }

        Contraceptive::create([
            "method" => $request->input('method'),
            "due_date" => $request->input('due'),
            "patient_id" => $request->input('patient'),
            "user_id" => Auth::id(),
        ]);

        return redirect('/admin/contraceptive')->with('success', 'Contraceptive created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $method = Contraceptive::findOrFail($id);
        $method->delete();
        return redirect('/admin/contraceptive')->with('success', 'Contraceptive deleted successfully.');
    }
}
