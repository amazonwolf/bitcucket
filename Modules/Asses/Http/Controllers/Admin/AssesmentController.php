<?php

namespace Modules\Asses\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Asses\Entities\Assesment;
use Modules\Asses\Http\Requests\CreateAssesmentRequest;
use Modules\Asses\Http\Requests\UpdateAssesmentRequest;
use Modules\Asses\Repositories\AssesmentRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class AssesmentController extends AdminBaseController
{
    /**
     * @var AssesmentRepository
     */
    private $assesment;

    public function __construct(AssesmentRepository $assesment)
    {
        parent::__construct();

        $this->assesment = $assesment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $assesments = $this->assesment->all();

        return view('asses::admin.assesments.index', compact('assesments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('asses::admin.assesments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateAssesmentRequest $request
     * @return Response
     */
    public function store(CreateAssesmentRequest $request)
    {
        $this->assesment->create($request->all());

        return redirect()->route('admin.asses.assesment.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('asses::assesments.title.assesments')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Assesment $assesment
     * @return Response
     */
    public function edit(Assesment $assesment)
    {
        return view('asses::admin.assesments.edit', compact('assesment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Assesment $assesment
     * @param  UpdateAssesmentRequest $request
     * @return Response
     */
    public function update(Assesment $assesment, UpdateAssesmentRequest $request)
    {
        $this->assesment->update($assesment, $request->all());

        return redirect()->route('admin.asses.assesment.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('asses::assesments.title.assesments')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Assesment $assesment
     * @return Response
     */
    public function destroy(Assesment $assesment)
    {
        $this->assesment->destroy($assesment);

        return redirect()->route('admin.asses.assesment.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('asses::assesments.title.assesments')]));
    }
}
