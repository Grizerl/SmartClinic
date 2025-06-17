<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Contracts\View\View;

class ReceptionController extends Controller
{
    /**
     * Summary of index
     * @param \Illuminate\Http\Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $query = Appointment::with(['user', 'doctor', 'service']);

        if ($request->filled('doctor_id')) {
            $query->where('doctor_id', $request->doctor_id);
        }

        $receptions = $query->paginate(10);
        $doctors = Doctor::all();

        return view('admin.appoinment.index', compact('receptions', 'doctors'));
    }
}
