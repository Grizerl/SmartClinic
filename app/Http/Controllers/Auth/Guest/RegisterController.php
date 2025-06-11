<?php

namespace App\Http\Controllers\Auth\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\GuestRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    /**
     * Summary of show
     * @return View
     */
    public function show(): View
    {
        return view('guest.register');
    }

    /**
     * Summary of store
     * @param \App\Http\Requests\Auth\GuestRequest $request
     * @return mixed|RedirectResponse
     */
    public function store(GuestRequest $request): RedirectResponse
    {
        User::create($request->validated());
        return redirect()->route('guest.show');
    }

}
