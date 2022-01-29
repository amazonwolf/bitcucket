<?php

namespace Modules\Accounts\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Accounts\Entities\Pending;
use Modules\Accounts\Http\Requests\CreatePendingRequest;
use Modules\Accounts\Http\Requests\UpdatePendingRequest;
use Modules\Accounts\Repositories\PendingRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class PendingController extends AdminBaseController
{
    /**
     * @var PendingRepository
     */
    private $pending;

    public function __construct(PendingRepository $pending)
    {
        parent::__construct();

        $this->pending = $pending;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$pendings = $this->pending->all();

        return view('accounts::admin.pendings.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounts::admin.pendings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePendingRequest $request
     * @return Response
     */
    public function store(CreatePendingRequest $request)
    {
        $this->pending->create($request->all());

        return redirect()->route('admin.accounts.pending.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('accounts::pendings.title.pendings')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Pending $pending
     * @return Response
     */
    public function edit(Pending $pending)
    {
        return view('accounts::admin.pendings.edit', compact('pending'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Pending $pending
     * @param  UpdatePendingRequest $request
     * @return Response
     */
    public function update(Pending $pending, UpdatePendingRequest $request)
    {
        $this->pending->update($pending, $request->all());

        return redirect()->route('admin.accounts.pending.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('accounts::pendings.title.pendings')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Pending $pending
     * @return Response
     */
    public function destroy(Pending $pending)
    {
        $this->pending->destroy($pending);

        return redirect()->route('admin.accounts.pending.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('accounts::pendings.title.pendings')]));
    }
}
