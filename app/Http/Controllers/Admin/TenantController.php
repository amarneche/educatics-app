<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTenantRequest;
use App\Http\Requests\Admin\UpdateTenantRequest;
use App\Models\User;
use Carbon\Carbon;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools=Tenant::with('domains')->get();

        return view('admin.tenants.index',compact('schools'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTenantRequest $request)
    {
        //
        $data =$request->validated();
        $data['owner_id']=auth()->user()->id;
        $data['status']="active";
        $data["valid_until"]= Carbon::today()->addDays(30);

        $tenant = Tenant::create($data);               
        //should validate subdomain . 
        $domain = implode("."  ,array_filter([$request->domain,env('MAIN_DOMAIN')]));
        $tenant->domains()->create(['domain'=>$domain]);
        
            $currentUserData= auth()->user()->getAttributes(); 
            $tenant->run(  function()use($currentUserData){
                $user = User::create($currentUserData);
                $user->assignRole(['admin']);
            } );
       
        session()->flash('success',__("Ecole crée avec success"));
        
        return redirect()->route('admin.schools.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $school)
    {
        //
        $school->load('domains');
        return view('admin.tenants.show',compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenant  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $school)
    {
        return view('admin.tenants.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tenant  $school
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTenantRequest $request, Tenant $school)
    {
        $school->update($request->validated());
        session()->flash('success', __("Tenants updated successfully"));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenant  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $school)
    {

        $school->delete();
        session()->flash('success', __("'Supprimé !'"));
        return redirect()->route("admin.schools.index");
    }
}
