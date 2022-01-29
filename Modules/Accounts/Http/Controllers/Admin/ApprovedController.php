<?php

namespace Modules\Accounts\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Accounts\Entities\Approved;
use Modules\Accounts\Http\Requests\CreateApprovedRequest;
use Modules\Accounts\Http\Requests\UpdateApprovedRequest;
use Modules\Accounts\Repositories\ApprovedRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ApprovedController extends AdminBaseController
{
    /**
     * @var ApprovedRepository
     */
    private $approved;

    public function __construct(ApprovedRepository $approved)
    {
        parent::__construct();

        $this->approved = $approved;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $approveds = $this->approved->all();

        return view('accounts::admin.approveds.index', compact('approveds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounts::admin.approveds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateApprovedRequest $request
     * @return Response
     */
    public function store(CreateApprovedRequest $request)
    {
        $this->approved->create($request->all());

        return redirect()->route('admin.accounts.approved.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('accounts::approveds.title.approveds')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Approved $approved
     * @return Response
     */
    public function edit(Approved $approved)
    {
        return view('accounts::admin.approveds.edit', compact('approved'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Approved $approved
     * @param  UpdateApprovedRequest $request
     * @return Response
     */
    public function update(Approved $approved, UpdateApprovedRequest $request)
    {
        $this->approved->update($approved, $request->all());

        return redirect()->route('admin.accounts.approved.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('accounts::approveds.title.approveds')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Approved $approved
     * @return Response
     */
    public function destroy(Approved $approved)
    {
        $this->approved->destroy($approved);

        return redirect()->route('admin.accounts.approved.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('accounts::approveds.title.approveds')]));
    }
}
