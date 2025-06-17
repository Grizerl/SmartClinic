<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Summary of index
     * @return View
     */
    public function index(): View
    {
        return view('doctor.index');
    }
}
