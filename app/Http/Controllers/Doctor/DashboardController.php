<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Models\Service;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Summary of index
     * @return View
     */
    public function index(): View
    {
        $appointmentCount = Appointment::count();
        $medicalRecordCount = MedicalRecord::count();
        $serviceCount = Service::count();

        return view('doctor.index', [
            'favor' => $serviceCount,
            'appoinment' => $appointmentCount,
            'records' => $medicalRecordCount,
        ]);
    }
}
