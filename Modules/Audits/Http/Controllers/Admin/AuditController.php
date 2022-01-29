<?php

namespace Modules\Audits\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Audits\Entities\Audit;
use Modules\Audits\Http\Requests\CreateAuditRequest;
use Modules\Audits\Http\Requests\UpdateAuditRequest;
use Modules\Audits\Repositories\AuditRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class AuditController extends AdminBaseController
{
    /**
     * @var AuditRepository
     */
    private $audit;

    public function __construct(AuditRepository $audit)
    {
        parent::__construct();

        $this->audit = $audit;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $audits = $this->audit->all();

        return view('audits::admin.audits.index', compact('audits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('audits::admin.audits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateAuditRequest $request
     * @return Response
     */
    public function store(CreateAuditRequest $request)
    {
        $this->audit->create($request->all());

        return redirect()->route('admin.audits.audit.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('audits::audits.title.audits')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Audit $audit
     * @return Response
     */
    public function edit(Audit $audit)
    {
        return view('audits::admin.audits.edit', compact('audit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Audit $audit
     * @param  UpdateAuditRequest $request
     * @return Response
     */
    public function update(Audit $audit, UpdateAuditRequest $request)
    {
        $this->audit->update($audit, $request->all());

        return redirect()->route('admin.audits.audit.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('audits::audits.title.audits')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Audit $audit
     * @return Response
     */
    public function destroy(Audit $audit)
    {
        $this->audit->destroy($audit);

        return redirect()->route('admin.audits.audit.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('audits::audits.title.audits')]));
    }
}
