<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTenantRequest;
use App\Http\Requests\Admin\UpdateTenantRequest;
use App\Models\Package;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list_tenants');
        $packages=Package::where('status','active')->get();
        $schools=Tenant::myTenants()->with('domains')->get();
        
        return view('admin.tenants.index',compact('schools','packages'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create',Tenant::class);
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
        $this->authorize('create',Tenant::class);

        $package = Package::find($request->package_id);
        $freeTrial= auth()->user()->eligibleForFreeTrial() &&   auth()->user()->isTenant();
        $total_amount= $freeTrial ? 0 : $package->price ;
        $currentUserData= auth()->user()->getAttributes(); 
        unset($currentUserData["id"]);
        $domain = implode("."  ,array_filter([$request->domain,env('MAIN_DOMAIN')]));
        $tenantData =$request->validated();        
        $tenantData['owner_id']=auth()->user()->id;
        $tenant=null;

        try{
            $tenant = Tenant::create($tenantData);  
            $tenant->domains()->create(['domain'=>$domain]);    
            $subscription=$tenant->subscriptions()->create([
                'package_id'=>$request->package_id,
                'start_date'=>Carbon::today(),
                'end_date'=>Carbon::today()->addDays(30),
                'status'=> $freeTrial ? 'trial': 'active'
            ]); 
    
    
            $invoice =$tenant->invoices()->create([
                'total_amount'=>$total_amount ,
                'paid_amount'=>0,
                'due_amount'=>$total_amount,
                'invoice_date'=>Carbon::today(),
                'due_date'=>$freeTrial ? Carbon::today()->addDays(30) : Carbon::today()->addDays(7)
            ]);
            // send invoice via email. 
            
            //should validate subdomain .
       
            $tenant->run(  function()use($currentUserData){
                    $user = User::create($currentUserData);
                    $user->assignRole([Role::ADMIN]);
                } );
           
            session()->flash('success',__("Ecole crée avec success"));
        }
        catch(\Exception $e){
            if(!is_null($tenant)){
                $tenant->delete();
                session()->flash('falure',__("Can't create LMS ".$e->getMessage()));

            }

        }
        catch(\Error $e){
            if(!is_null($tenant)){
                $tenant->delete();
                session()->flash('falure',__("Can't create LMS ".$e->getMessage()));

            }
        }
        
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
        $this->authorize('view',$school);
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
        $this->authorize('edit', $school);
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
        $this->authorize('edit', $school);
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
        $this->authorize('delete', $school);
        $school->delete();
        session()->flash('success', __("'Supprimé !'"));
        return redirect()->route("admin.schools.index");
    }
}
