<?php

namespace App\Http\Controllers;

use Aimedidierm\FdiSms\SendSms;
use App\Http\Requests\NotificationRequest;
use App\Models\Contraceptive;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

        if ($request->input('method') == 'All') {
            $contraceptives = Contraceptive::all();
        } else {
            $contraceptives = Contraceptive::where('method', $request->input('method'))->get();
        }

        if ($contraceptives->isNotEmpty()) {
            foreach ($contraceptives as $contraceptive) {
                $patientName = $contraceptive->patient->name;
                $announce = $request->input('message');

                $to = $contraceptive->patient->phone;
                $message = "Hello $patientName, $announce";
                $senderId = "FDI";
                $ref = Str::random(30);
                $callbackUrl = "";

                try {
                    $apiUsername = env('SMS_USERNAME');
                    $apiPassword = env('SMS_PASSWORD');
                    $smsSender = new SendSms($apiUsername, $apiPassword);

                    $smsSender->sendSms($to, $message, $senderId, $ref, $callbackUrl);
                } catch (\Exception $e) {
                    return response()->json(['message' => $e->getMessage()], 500);
                }
            }
            return redirect('/admin/announcements')->with('success', 'Announcements created successfully.');
        } else {
            return redirect('/admin/announcements')->with('success', 'Announcements created successfully. but no patients found to get SMS');
        }
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
