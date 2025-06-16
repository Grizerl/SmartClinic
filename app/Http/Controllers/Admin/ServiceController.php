<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ServicRequest;
use App\Models\Service;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ServiceController extends Controller
{
    /**
     * Summary of index
     * @return View
     */
    public function index(): View
    {
        $services = Service::paginate(15);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Summary of create
     * @return View
     */
    public function create(): View
    {
        return view('admin.services.create');
    }

    /**
     * Summary of store
     * @param \App\Http\Requests\Dashboard\ServicRequest $request
     * @return mixed|RedirectResponse
     */
    public function store(ServicRequest $request): RedirectResponse
    {
        Service::create($request->validated());
        return redirect()->route('services.index');
    }

    /**
     * Summary of show
     * @param \App\Models\Service $service
     * @return mixed|RedirectResponse
     */
    public function show(Service $service): RedirectResponse
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
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Summary of update
     * @param \App\Http\Requests\Dashboard\ServicRequest $request
     * @param int $id
     * @return mixed|RedirectResponse
     */
    public function update(ServicRequest $request, int $id): RedirectResponse
    {
        $service = Service::findOrFail($id);

        $service->update($request->validated());

        return redirect()->back();
    }

    /**
     * Summary of destroy
     * @param int $id
     * @return mixed|RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
       Service::findOrFail($id)->delete();
       return redirect()->back();
    }
}
