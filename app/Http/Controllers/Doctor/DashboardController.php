<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Summary of index
     * @return View
     */
    public function index(): View
    {
        $doctor = Auth::guard('doctor')->user();

        $doctor = $data = Appointment::count();
        $doctor = $data = MedicalRecord::count();

        $appoinment = $doctor;
        $records = $doctor;

        return view('doctor.index', [
            'favor' => Service::count(),
            'appoinment' => $appoinment,
            'records' => $records,
        ]);
    }
}
