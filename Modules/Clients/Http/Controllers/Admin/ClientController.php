<?php

namespace Modules\Clients\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Clients\Entities\Client;
use Modules\Clients\Http\Requests\CreateClientRequest;
use Modules\Clients\Http\Requests\UpdateClientRequest;
use Modules\Clients\Repositories\ClientRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Information\Repositories\CompanytyRepository;
use Modules\Information\Repositories\CountriesRepository;
use Modules\Information\Repositories\LanguagesRepository;
use Excel;
use DB;

class ClientController extends AdminBaseController
{
    /**
     * @var ClientRepository
     */
    private $client;

    public function __construct(ClientRepository $client,CompanytyRepository $companyty,CountriesRepository $countries,LanguagesRepository $languages)
    {
        parent::__construct();

        $this->client = $client;
        $this->companyty = $companyty;
        $this->countries = $countries;
        $this->languages = $languages;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clients = $this->client->all();

        return view('clients::admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $companyty = $this->companyty->all();
        $countries = $this->countries->all();
        $languages = $this->languages->all();

        return view('clients::admin.clients.create',compact('companyty','countries','languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateClientRequest $request
     * @return Response
     */
    public function store(CreateClientRequest $request)
    {
      if(isset($request->image))
        {     
          $file_name = $_FILES['image']['name'];
          $file_size =$_FILES['image']['size'];
          $file_tmp =$_FILES['image']['tmp_name'];
          $file_type=$_FILES['image']['type'];


          
          $expensions= array("jpeg","jpg","png",'pdf');
          
          $newfile = "assets/media/".time().$file_name;
          if($file_size > 2097152)
          {
             $errors[]='File size must be excately 2 MB';
          }
          
          if(empty($errors)==true)
          {
             move_uploaded_file($file_tmp,$newfile);
             echo "Success";
          }

          $request->merge(array('profile' => $newfile));
        }

        $role_type = $this->role->findByName(['name' => 'student']);
        if(isset($role_type->name)){
            $request->merge(array('role' => $role_type->name));
            $user_detail = $this->user->createWithRoles($request->all(),$role_type->id,true);
            $year = $this->year->findByAttributes(['active' => 1]);
            
            $request->merge(array('user_id' => $user_detail->id, 'role' => 'Student','academic_year' => $year->id));
        }

        //   $role_type = $this->role->findByName(['name' => 'student']);
        //   if(isset($role_type->name)){
        //       $request->merge(array('role' => $role_type->name));
        //       $user_detail = $this->user->createWithRoles($request->all(),$role_type->id,true);
        //       $year = $this->year->findByAttributes(['active' => 1]);
              
        //       $request->merge(array('user_id' => $user_detail->id, 'role' => 'Student','academic_year' => $year->id));
        //   }
  
        $this->client->create($request->all());

        return redirect()->route('admin.clients.client.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('clients::clients.title.clients')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Client $client
     * @return Response
     */
    public function edit(Client $client)
    {
         $companyty = $this->companyty->all();
         $countries = $this->countries->all();
         $languages = $this->languages->all();

        
        return view('clients::admin.clients.edit', compact('client','companyty','countries','languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Client $client
     * @param  UpdateClientRequest $request
     * @return Response
     */
    public function update(Client $client, UpdateClientRequest $request)
    {
        $this->client->update($client, $request->all());

        return redirect()->route('admin.clients.client.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('clients::clients.title.clients')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client $client
     * @return Response
     */
    public function destroy(Client $client)
    {
        $this->client->destroy($client);

        return redirect()->route('admin.clients.client.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('clients::clients.title.clients')]));
    }
}
