<?php

namespace Modules\Information\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Information\Entities\Languages;
use Modules\Information\Http\Requests\CreateLanguagesRequest;
use Modules\Information\Http\Requests\UpdateLanguagesRequest;
use Modules\Information\Repositories\LanguagesRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class LanguagesController extends AdminBaseController
{
    /**
     * @var LanguagesRepository
     */
    private $languages;

    public function __construct(LanguagesRepository $languages)
    {
        parent::__construct();

        $this->languages = $languages;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$languages = $this->languages->all();

        return view('information::admin.languages.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('information::admin.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateLanguagesRequest $request
     * @return Response
     */
    public function store(CreateLanguagesRequest $request)
    {
        $this->languages->create($request->all());

        return redirect()->route('admin.information.languages.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('information::languages.title.languages')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Languages $languages
     * @return Response
     */
    public function edit(Languages $languages)
    {
        return view('information::admin.languages.edit', compact('languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Languages $languages
     * @param  UpdateLanguagesRequest $request
     * @return Response
     */
    public function update(Languages $languages, UpdateLanguagesRequest $request)
    {
        $this->languages->update($languages, $request->all());

        return redirect()->route('admin.information.languages.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('information::languages.title.languages')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Languages $languages
     * @return Response
     */
    public function destroy(Languages $languages)
    {
        $this->languages->destroy($languages);

        return redirect()->route('admin.information.languages.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('information::languages.title.languages')]));
    }
}
