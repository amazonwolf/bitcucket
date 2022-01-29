<?php

namespace Modules\Appointment\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Appointment\Entities\Appoint;
use Modules\Appointment\Http\Requests\CreateAppointRequest;
use Modules\Appointment\Http\Requests\UpdateAppointRequest;
use Modules\Appointment\Repositories\AppointRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class AppointController extends AdminBaseController
{
    /**
     * @var AppointRepository
     */
    private $appoint;

    public function __construct(AppointRepository $appoint)
    {
        parent::__construct();

        $this->appoint = $appoint;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $appoints = $this->appoint->all();

        return view('appointment::admin.appoints.index', compact('appoints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('appointment::admin.appoints.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateAppointRequest $request
     * @return Response
     */
    public function store(CreateAppointRequest $request)
    {
        $this->appoint->create($request->all());

        return redirect()->route('admin.appointment.appoint.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('appointment::appoints.title.appoints')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Appoint $appoint
     * @return Response
     */
    public function edit(Appoint $appoint)
    {
        return view('appointment::admin.appoints.edit', compact('appoint'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Appoint $appoint
     * @param  UpdateAppointRequest $request
     * @return Response
     */
    public function update(Appoint $appoint, UpdateAppointRequest $request)
    {
        $this->appoint->update($appoint, $request->all());

        return redirect()->route('admin.appointment.appoint.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('appointment::appoints.title.appoints')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Appoint $appoint
     * @return Response
     */
    public function destroy(Appoint $appoint)
    {
        $this->appoint->destroy($appoint);

        return redirect()->route('admin.appointment.appoint.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('appointment::appoints.title.appoints')]));
    }
}
