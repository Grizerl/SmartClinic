<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $doctor = Auth::guard('doctor')->user();

        if (!$doctor) {
            abort(403, 'Unauthorized');
        }

        $records = MedicalRecord::where('doctor_id', $doctor->id)->paginate(15);

        return view('doctor.record.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $doctor = Auth::guard('doctor')->user();

        if (!$doctor) {
            abort(403, 'Unauthorized');
        }

        $userIds = Appointment::where('doctor_id', $doctor->id)->pluck('user_id')->unique();

        $client = User::where('role', 'user')->whereIn('id', $userIds)->get();

        return view('doctor.record.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'user_id' => 'required',
            'description' => 'required|string|max:255',
        ]);

        $doctor = Auth::guard('doctor')->user();

        if (!$doctor) {
            abort(403, 'Unauthorized');
        }

        $data['doctor_id'] = $doctor->id;

        MedicalRecord::create($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalRecord $medicalRecord): RedirectResponse
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicalRecord $medicalRecord): View
    {
        $doctor = Auth::guard('doctor')->user();

        if (!$doctor) {
            abort(403, 'Unauthorized');
        }

        $userIds = Appointment::where('doctor_id', $doctor->id)->pluck('user_id')->unique();

        $client = User::where('role', 'user')->whereIn('id', $userIds)->get();

        $record = $medicalRecord;

        return view('doctor.record.edit', compact('client', 'record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedicalRecord $medicalRecord): RedirectResponse
    {
        $data = $request->validate([
            'user_id' => 'required',
            'description' => 'required|string|max:255',
        ]);

        $doctor = Auth::guard('doctor')->user();

        if (!$doctor) {
            abort(403, 'Unauthorized');
        }

        $data['doctor_id'] = $doctor->id;

        $medicalRecord->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalRecord $medicalRecord): RedirectResponse
    {
        $medicalRecord->delete();
        return redirect()->back();
    }
}
