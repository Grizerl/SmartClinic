<?php

namespace App\Http\Controllers\Auth\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Doctor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(): View
    {
        return view('doctor.inc.login');
    }

    /**
     * Summary of store
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return mixed|RedirectResponse
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $data = Doctor::where('phone', $request->phone)
            ->where('email', $request->email)->first();

        if ($data) {
            Auth::login($data);
            return redirect()->route('dashboard.doctor');
        }

        return redirect()->back();

    }
}
