<?php

namespace Modules\Certi\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Certi\Entities\Certificate;
use Modules\Certi\Http\Requests\CreateCertificateRequest;
use Modules\Certi\Http\Requests\UpdateCertificateRequest;
use Modules\Certi\Repositories\CertificateRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CertificateController extends AdminBaseController
{
    /**
     * @var CertificateRepository
     */
    private $certificate;

    public function __construct(CertificateRepository $certificate)
    {
        parent::__construct();

        $this->certificate = $certificate;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $certificates = $this->certificate->all();

        return view('certi::admin.certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('certi::admin.certificates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCertificateRequest $request
     * @return Response
     */
    public function store(CreateCertificateRequest $request)
    {
        $this->certificate->create($request->all());

        return redirect()->route('admin.certi.certificate.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('certi::certificates.title.certificates')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Certificate $certificate
     * @return Response
     */
    public function edit(Certificate $certificate)
    {
        return view('certi::admin.certificates.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Certificate $certificate
     * @param  UpdateCertificateRequest $request
     * @return Response
     */
    public function update(Certificate $certificate, UpdateCertificateRequest $request)
    {
        $this->certificate->update($certificate, $request->all());

        return redirect()->route('admin.certi.certificate.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('certi::certificates.title.certificates')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Certificate $certificate
     * @return Response
     */
    public function destroy(Certificate $certificate)
    {
        $this->certificate->destroy($certificate);

        return redirect()->route('admin.certi.certificate.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('certi::certificates.title.certificates')]));
    }
}
