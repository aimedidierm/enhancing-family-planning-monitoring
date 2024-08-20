<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        Patient::create([
            "name" => $request->input('name'),
            "phone" => $request->input('phone'),
            "dob" => $request->input('dob'),
            "email" => $request->input('email'),
            "sex" => $request->input('sex'),
            "address" => $request->input('address'),
        ]);

        return redirect('/admin/patients')->with('success', 'Patient created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatientRequest $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->update($request->only(['name', 'phone', 'email', 'dob', 'address', 'sex']));

        return redirect()->route('admin.patients.index')->with('success', 'Patient updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect('/admin/patients')->with('success', 'Patient deleted successfully.');
    }
}
