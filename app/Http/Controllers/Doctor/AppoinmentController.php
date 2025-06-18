<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppoinmentController extends Controller
{
    /**
     * Summary of index
     * @return View
     */
    public function index(): View
    {
        $doctor = Auth::guard('doctor')->user();

        if (!$doctor) {
            abort(403, 'Unauthorized');
        }

        $appoinments = Appointment::where('doctor_id', $doctor->id)->paginate(15);

        return view('doctor.appoinment.index', compact('appoinments'));

    }

    /**
     * Display the specified resource.
     */
    public function show(): RedirectResponse
    {
        return redirect()->back();
    }

    /**
     * Summary of edit
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $appointment = Appointment::findOrFail($id);

        return view('doctor.appoinment.edit', compact('appointment'));
    }

    /**
     * Summary of update
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return mixed|RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $appointment = Appointment::findOrFail($id);

        $data = $request->validate([
            'status' => 'required|string|in:scheduled,completed,cancelled',
        ]);

        $appointment->update($data);

        return redirect()->back();
    }

    /**
     * Summary of destroy
     * @param int $id
     * @return mixed|RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Appointment::findOrFail($id)->delete();
        return redirect()->back();

    }
}
