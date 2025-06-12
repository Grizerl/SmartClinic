<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Summary of main
     * @return View
     */
    public function index(): View
    {
        $user = auth()->user();
        return view('partials.dashboard', [
            'futureAppointment' => $user->appointment()->where('created_at', '>=', now())->paginate(2),
            'pastAppointment' => $user->appointment()->where('created_at', '<', now())->paginate(2),
            'medicalRecord' => $user->medical_record()->paginate(2)
        ]);
    }
}
