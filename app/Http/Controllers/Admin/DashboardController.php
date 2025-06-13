<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Summary of index
     * @return View
     */
    public function index(): View
    {
        return view('admin.dashboard', [
            'doctors' => Doctor::count(),
            'users' => User::count(),
            'receptions' => Appointment::count(),
        ]);
    }
}
