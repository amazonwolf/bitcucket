<?php

namespace Modules\Information\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Information\Entities\Countries;
use Modules\Information\Http\Requests\CreateCountriesRequest;
use Modules\Information\Http\Requests\UpdateCountriesRequest;
use Modules\Information\Repositories\CountriesRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CountriesController extends AdminBaseController
{
    /**
     * @var CountriesRepository
     */
    private $countries;

    public function __construct(CountriesRepository $countries)
    {
        parent::__construct();

        $this->countries = $countries;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$countries = $this->countries->all();

        return view('information::admin.countries.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('information::admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCountriesRequest $request
     * @return Response
     */
    public function store(CreateCountriesRequest $request)
    {
        $this->countries->create($request->all());

        return redirect()->route('admin.information.countries.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('information::countries.title.countries')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Countries $countries
     * @return Response
     */
    public function edit(Countries $countries)
    {
        return view('information::admin.countries.edit', compact('countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Countries $countries
     * @param  UpdateCountriesRequest $request
     * @return Response
     */
    public function update(Countries $countries, UpdateCountriesRequest $request)
    {
        $this->countries->update($countries, $request->all());

        return redirect()->route('admin.information.countries.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('information::countries.title.countries')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Countries $countries
     * @return Response
     */
    public function destroy(Countries $countries)
    {
        $this->countries->destroy($countries);

        return redirect()->route('admin.information.countries.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('information::countries.title.countries')]));
    }
}
