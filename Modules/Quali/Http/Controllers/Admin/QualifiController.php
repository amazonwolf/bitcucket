<?php

namespace Modules\Quali\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Quali\Entities\Qualifi;
use Modules\Quali\Http\Requests\CreateQualifiRequest;
use Modules\Quali\Http\Requests\UpdateQualifiRequest;
use Modules\Quali\Repositories\QualifiRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class QualifiController extends AdminBaseController
{
    /**
     * @var QualifiRepository
     */
    private $qualifi;

    public function __construct(QualifiRepository $qualifi)
    {
        parent::__construct();

        $this->qualifi = $qualifi;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $qualifis = $this->qualifi->all();

        return view('quali::admin.qualifis.index', compact('qualifis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('quali::admin.qualifis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateQualifiRequest $request
     * @return Response
     */
    public function store(CreateQualifiRequest $request)
    {
        $this->qualifi->create($request->all());

        return redirect()->route('admin.quali.qualifi.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('quali::qualifis.title.qualifis')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Qualifi $qualifi
     * @return Response
     */
    public function edit(Qualifi $qualifi)
    {
        return view('quali::admin.qualifis.edit', compact('qualifi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Qualifi $qualifi
     * @param  UpdateQualifiRequest $request
     * @return Response
     */
    public function update(Qualifi $qualifi, UpdateQualifiRequest $request)
    {
        $this->qualifi->update($qualifi, $request->all());

        return redirect()->route('admin.quali.qualifi.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('quali::qualifis.title.qualifis')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Qualifi $qualifi
     * @return Response
     */
    public function destroy(Qualifi $qualifi)
    {
        $this->qualifi->destroy($qualifi);

        return redirect()->route('admin.quali.qualifi.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('quali::qualifis.title.qualifis')]));
    }
}
