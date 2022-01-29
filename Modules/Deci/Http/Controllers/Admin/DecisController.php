<?php

namespace Modules\Deci\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Deci\Entities\Decis;
use Modules\Deci\Http\Requests\CreateDecisRequest;
use Modules\Deci\Http\Requests\UpdateDecisRequest;
use Modules\Deci\Repositories\DecisRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DecisController extends AdminBaseController
{
    /**
     * @var DecisRepository
     */
    private $decis;

    public function __construct(DecisRepository $decis)
    {
        parent::__construct();

        $this->decis = $decis;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $decis = $this->decis->all();

        return view('deci::admin.decis.index', compact('decis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('deci::admin.decis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateDecisRequest $request
     * @return Response
     */
    public function store(CreateDecisRequest $request)
    {
        $this->decis->create($request->all());

        return redirect()->route('admin.deci.decis.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('deci::decis.title.decis')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Decis $decis
     * @return Response
     */
    public function edit(Decis $decis)
    {
        return view('deci::admin.decis.edit', compact('decis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Decis $decis
     * @param  UpdateDecisRequest $request
     * @return Response
     */
    public function update(Decis $decis, UpdateDecisRequest $request)
    {
        $this->decis->update($decis, $request->all());

        return redirect()->route('admin.deci.decis.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('deci::decis.title.decis')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Decis $decis
     * @return Response
     */
    public function destroy(Decis $decis)
    {
        $this->decis->destroy($decis);

        return redirect()->route('admin.deci.decis.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('deci::decis.title.decis')]));
    }
}
