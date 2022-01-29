<?php

namespace Modules\Clients\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Clients\Entities\Offers;
use Modules\Clients\Http\Requests\CreateOffersRequest;
use Modules\Clients\Http\Requests\UpdateOffersRequest;
use Modules\Clients\Repositories\OffersRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class OffersController extends AdminBaseController
{
    /**
     * @var OffersRepository
     */
    private $offers;

    public function __construct(OffersRepository $offers)
    {
        parent::__construct();

        $this->offers = $offers;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $offers = $this->offers->all();

        return view('clients::admin.offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('clients::admin.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateOffersRequest $request
     * @return Response
     */
    public function store(CreateOffersRequest $request)
    {
        $this->offers->create($request->all());

        return redirect()->route('admin.clients.offers.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('clients::offers.title.offers')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Offers $offers
     * @return Response
     */
    public function edit(Offers $offers)
    {
        return view('clients::admin.offers.edit', compact('offers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Offers $offers
     * @param  UpdateOffersRequest $request
     * @return Response
     */
    public function update(Offers $offers, UpdateOffersRequest $request)
    {
        $this->offers->update($offers, $request->all());

        return redirect()->route('admin.clients.offers.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('clients::offers.title.offers')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Offers $offers
     * @return Response
     */
    public function destroy(Offers $offers)
    {
        $this->offers->destroy($offers);

        return redirect()->route('admin.clients.offers.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('clients::offers.title.offers')]));
    }
}
