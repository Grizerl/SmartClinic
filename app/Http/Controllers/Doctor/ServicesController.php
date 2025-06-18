<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function show(): View
    {
        $favor = Service::paginate(15);
        return view('doctor.services.index', compact('favor'));
    }
}
