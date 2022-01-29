<?php

namespace Modules\Prasad\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Prasad\Entities\Add_details;
use Modules\Prasad\Http\Requests\CreateAdd_detailsRequest;
use Modules\Prasad\Http\Requests\UpdateAdd_detailsRequest;
use Modules\Prasad\Repositories\Add_detailsRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class Add_detailsController extends AdminBaseController
{
    /**
     * @var Add_detailsRepository
     */
    private $add_details;

    public function __construct(Add_detailsRepository $add_details)
    {
        parent::__construct();

        $this->add_details = $add_details;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$add_details = $this->add_details->all();

        return view('prasad::admin.add_details.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('prasad::admin.add_details.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateAdd_detailsRequest $request
     * @return Response
     */
    public function store(CreateAdd_detailsRequest $request)
    {
        $this->add_details->create($request->all());

        return redirect()->route('admin.prasad.add_details.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('prasad::add_details.title.add_details')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Add_details $add_details
     * @return Response
     */
    public function edit(Add_details $add_details)
    {
        return view('prasad::admin.add_details.edit', compact('add_details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Add_details $add_details
     * @param  UpdateAdd_detailsRequest $request
     * @return Response
     */
    public function update(Add_details $add_details, UpdateAdd_detailsRequest $request)
    {
        $this->add_details->update($add_details, $request->all());

        return redirect()->route('admin.prasad.add_details.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('prasad::add_details.title.add_details')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Add_details $add_details
     * @return Response
     */
    public function destroy(Add_details $add_details)
    {
        $this->add_details->destroy($add_details);

        return redirect()->route('admin.prasad.add_details.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('prasad::add_details.title.add_details')]));
    }
}
