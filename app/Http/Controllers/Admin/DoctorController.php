<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\DoctorRequest;
use App\Models\Doctor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Summary of index
     * @return View
     */
    public function index(): View
    {
        $doctors = Doctor::paginate(15);
        return view('admin.doctors.index', compact('doctors'));
    }

    /**
     * Summary of create
     * @return View
     */
    public function create(): View
    {
        return view('admin.doctors.create');
    }

    /**
     * Summary of store
     * @param \App\Http\Requests\Dashboard\DoctorRequest $request
     * @return mixed|RedirectResponse
     */
    public function store(DoctorRequest $request): RedirectResponse
    {
        Doctor::create($request->validated());
        return redirect()->route('doctors.index');
    }

    /**
     * Summary of show
     * @param \App\Models\Doctor $doctor
     * @return mixed|RedirectResponse
     */
    public function show(Doctor $doctor): RedirectResponse
    {
        return redirect()->back();
    }

    /**
     * Summary of edit
     * @param int $id
     * @return View
     */
    public function edit(int $id)
    {
        $doctors = Doctor::findOrFail($id);
        return view('admin.doctors.edit', compact('doctors'));
    }

    /**
     * Summary of update
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return mixed|RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $doctors = Doctor::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'specialization' => 'required|string|min:3|max:255',
            'phone' => 'required|string|min:10|max:20',
            'email' => 'required|email',
        ]);

        $doctors->update($validatedData);

        return redirect()->back();
    }

    /**
     * Summary of destroy
     * @param int $id
     * @return mixed|RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        Doctor::findOrFail($id)->delete();
        return redirect()->back();
    }
}
