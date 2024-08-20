<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::all();
        return view('announcements', compact('notifications'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotificationRequest $request)
    {
        Notification::create([
            "title" => $request->input('title'),
            "message" => $request->input('message'),
            "method" => $request->input('method'),
            "user_id" => Auth::id(),
        ]);

        return redirect('/admin/announcements')->with('success', 'Announcements created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();
        return redirect('/admin/announcements')->with('success', 'Announcement deleted successfully.');
    }
}
