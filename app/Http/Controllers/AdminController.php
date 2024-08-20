<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::all();
        return view('admins', compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        User::create([
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "password" => bcrypt('password'),
        ]);

        return redirect('/admin/admins')->with('success', 'Admin account created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();
        return redirect('/admin/admins')->with('success', 'Admin deleted successfully.');
    }
}
