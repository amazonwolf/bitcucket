<?php

namespace Modules\Coord\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Coord\Entities\Auditor;
use Modules\Coord\Http\Requests\CreateAuditorRequest;
use Modules\Coord\Http\Requests\UpdateAuditorRequest;
use Modules\Coord\Repositories\AuditorRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class AuditorController extends AdminBaseController
{
    /**
     * @var AuditorRepository
     */
    private $auditor;

    public function __construct(AuditorRepository $auditor)
    {
        parent::__construct();

        $this->auditor = $auditor;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $auditors = $this->auditor->all();

        return view('coord::admin.auditors.index', compact('auditors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('coord::admin.auditors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateAuditorRequest $request
     * @return Response
     */
    public function store(CreateAuditorRequest $request)
    {
        $this->auditor->create($request->all());

        return redirect()->route('admin.coord.auditor.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('coord::auditors.title.auditors')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Auditor $auditor
     * @return Response
     */
    public function edit(Auditor $auditor)
    {
        return view('coord::admin.auditors.edit', compact('auditor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Auditor $auditor
     * @param  UpdateAuditorRequest $request
     * @return Response
     */
    public function update(Auditor $auditor, UpdateAuditorRequest $request)
    {
        $this->auditor->update($auditor, $request->all());

        return redirect()->route('admin.coord.auditor.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('coord::auditors.title.auditors')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Auditor $auditor
     * @return Response
     */
    public function destroy(Auditor $auditor)
    {
        $this->auditor->destroy($auditor);

        return redirect()->route('admin.coord.auditor.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('coord::auditors.title.auditors')]));
    }
}
