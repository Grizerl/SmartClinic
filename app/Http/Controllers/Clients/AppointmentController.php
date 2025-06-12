<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AppoinmentRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AppointmentController extends Controller
{
    /**
     * Summary of appointment
     * @return View
     */
    public function create(): View
    {
        return view('guest.appointment.appointment', [
            'doctor' => Doctor::select('id', 'name', 'specialization')->get(),
            'service' => Service::select('id', 'name', 'price')->get(),
        ]);
    }

    /**
     * Summary of store
     * @param \App\Http\Requests\Dashboard\AppoinmentRequest $request
     * @return mixed|RedirectResponse
     */
    public function store(AppoinmentRequest $request): RedirectResponse
    {
        $user = auth()->user();
        $data = array_merge($request->validated(), ['user_id' => $user->id]);
        Appointment::create($data);
        return redirect()->route('client.dashboard');
    }

}
