<?php

namespace App\Http\Controllers\Auth\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Summary of show
     * @return View
     */
    public function show(): View
    {
        return view('guest.login');
    }

    /**
     * Summary of store
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return mixed|RedirectResponse
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $user = User::where('phone', $request->phone)
            ->where('email', $request->email)->first();

        if ($user) {
            Auth::login($user);
            return redirect()->route('register.show');
        }

        return redirect()->back();
    }

}
