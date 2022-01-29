<?php

namespace Modules\Information\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Information\Entities\Companyty;
use Modules\Information\Http\Requests\CreateCompanytyRequest;
use Modules\Information\Http\Requests\UpdateCompanytyRequest;
use Modules\Information\Repositories\CompanytyRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CompanytyController extends AdminBaseController
{
    /**
     * @var CompanytyRepository
     */
    private $companyty;

    public function __construct(CompanytyRepository $companyty)
    {
        parent::__construct();

        $this->companyty = $companyty;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$companyties = $this->companyty->all();

        return view('information::admin.companyties.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('information::admin.companyties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCompanytyRequest $request
     * @return Response
     */
    public function store(CreateCompanytyRequest $request)
    {
        $this->companyty->create($request->all());

        return redirect()->route('admin.information.companyty.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('information::companyties.title.companyties')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Companyty $companyty
     * @return Response
     */
    public function edit(Companyty $companyty)
    {
        return view('information::admin.companyties.edit', compact('companyty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Companyty $companyty
     * @param  UpdateCompanytyRequest $request
     * @return Response
     */
    public function update(Companyty $companyty, UpdateCompanytyRequest $request)
    {
        $this->companyty->update($companyty, $request->all());

        return redirect()->route('admin.information.companyty.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('information::companyties.title.companyties')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Companyty $companyty
     * @return Response
     */
    public function destroy(Companyty $companyty)
    {
        $this->companyty->destroy($companyty);

        return redirect()->route('admin.information.companyty.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('information::companyties.title.companyties')]));
    }
}
