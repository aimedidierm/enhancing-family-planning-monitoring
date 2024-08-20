<?php

namespace App\Http\Controllers;

use App\Enums\ContraceptiveMethod;
use App\Models\Contraceptive;
use App\Models\Notification;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function analytics()
    {
        $patients = Patient::count();
        $admins = User::count();
        $announcements = Notification::count();
        $oralPills = Contraceptive::where('method', ContraceptiveMethod::ORALPILLS->value)->count();
        $Injectables = Contraceptive::where('method', ContraceptiveMethod::INJECTABLES->value)->count();
        $Implants = Contraceptive::where('method', ContraceptiveMethod::IMPLANTS->value)->count();
        $IUDs = Contraceptive::where('method', ContraceptiveMethod::IUDS->value)->count();
        return view('dashboard', compact(
            'patients',
            'admins',
            'announcements',
            'oralPills',
            'Injectables',
            'Implants',
            'IUDs'
        ));
    }
}
