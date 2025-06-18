<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctor = Auth::guard('doctor')->user();

        $doctor = $data = MedicalRecord::paginate(15);

        $records = $doctor;

        return view('doctor.record.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $doctor = Auth::guard('doctor')->user();

    if (!$doctor) {
        abort(403, 'Unauthorized'); // або redirect()->route('doctor.login')
    }

    // Вибираємо user_id усіх записів, де doctor_id співпадає з поточним лікарем
    $userIds = Appointment::where('doctor_id', $doctor->id)
                ->pluck('user_id')
                ->unique();

    // Вибираємо клієнтів, які мають роль user і їх id у списку userIds
    $client = User::where('role', 'user')
                ->whereIn('id', $userIds)
                ->get();

    return view('doctor.record.create', compact('client'));
}



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'description' => 'required|string|max:255',
        ]);

        $doctor = Auth::guard('doctor')->user();

        if(!$doctor)
        {
            abort(403, 'Unauthorized');
        }

        $data['doctor_id'] = $doctor->id;

        MedicalRecord::create($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicalRecord $medicalRecord)
    {
       $doctor = Auth::guard('doctor')->user();

    if (!$doctor) {
        abort(403, 'Unauthorized'); // або redirect()->route('doctor.login')
    }

    // Вибираємо user_id усіх записів, де doctor_id співпадає з поточним лікарем
    $userIds = Appointment::where('doctor_id', $doctor->id)
                ->pluck('user_id')
                ->unique();

    // Вибираємо клієнтів, які мають роль user і їх id у списку userIds
    $client = User::where('role', 'user')
                ->whereIn('id', $userIds)
                ->get();

    $record = $medicalRecord;
    return view('doctor.record.edit', compact('client','record'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedicalRecord $medicalRecord)
    {
           $data = $request->validate([
            'user_id' => 'required',
            'description' => 'required|string|max:255',
        ]);

        $doctor = Auth::guard('doctor')->user();

        if(!$doctor)
        {
            abort(403, 'Unauthorized');
        }

        $data['doctor_id'] = $doctor->id;

       $medicalRecord->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalRecord $medicalRecord)
    {
        $medicalRecord->delete();
        return redirect()->back();
    }
}
