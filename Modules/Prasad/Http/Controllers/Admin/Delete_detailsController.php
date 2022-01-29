<?php

namespace Modules\Prasad\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Prasad\Entities\Delete_details;
use Modules\Prasad\Http\Requests\CreateDelete_detailsRequest;
use Modules\Prasad\Http\Requests\UpdateDelete_detailsRequest;
use Modules\Prasad\Repositories\Delete_detailsRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class Delete_detailsController extends AdminBaseController
{
    /**
     * @var Delete_detailsRepository
     */
    private $delete_details;

    public function __construct(Delete_detailsRepository $delete_details)
    {
        parent::__construct();

        $this->delete_details = $delete_details;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$delete_details = $this->delete_details->all();

        return view('prasad::admin.delete_details.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('prasad::admin.delete_details.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateDelete_detailsRequest $request
     * @return Response
     */
    public function store(CreateDelete_detailsRequest $request)
    {
        $this->delete_details->create($request->all());

        return redirect()->route('admin.prasad.delete_details.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('prasad::delete_details.title.delete_details')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Delete_details $delete_details
     * @return Response
     */
    public function edit(Delete_details $delete_details)
    {
        return view('prasad::admin.delete_details.edit', compact('delete_details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Delete_details $delete_details
     * @param  UpdateDelete_detailsRequest $request
     * @return Response
     */
    public function update(Delete_details $delete_details, UpdateDelete_detailsRequest $request)
    {
        $this->delete_details->update($delete_details, $request->all());

        return redirect()->route('admin.prasad.delete_details.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('prasad::delete_details.title.delete_details')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Delete_details $delete_details
     * @return Response
     */
    public function destroy(Delete_details $delete_details)
    {
        $this->delete_details->destroy($delete_details);

        return redirect()->route('admin.prasad.delete_details.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('prasad::delete_details.title.delete_details')]));
    }
}
