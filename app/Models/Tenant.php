<?php

namespace App\Models;

use App\Models\Scopes\MySchoolsScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains,HasFactory;
    protected $dates=["valid_until"];

    public static function getCustomColumns(): array
    {
        return [
            'id'
        ];
    }

    //scope of My Tenants: Tenant::all() == Tenant::myTenants(); either owner == or all incase i'm admin.
    
    // public static function booted(){
    //     static::addGlobalScope(new MySchoolsScope);
    // }
        /**
     * Scope a query to only include users of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMyTenants(Builder $query){
        
        if(Auth::check() && ! Auth::user()->hasRole([Role::SUPER_ADMIN]))
            return $query->where('data->owner_id',Auth::user()->id);
        
    }

    public function users(){
       
        return $this->run(fn()  => User::all()); 
        
    }

    public function owner (){
        return $this->belongsTo(User::class,'owner_id');
    }

    public function getValidUntilFormattedAttribute(){
        if($this->valid_until)
        return $this->valid_until->format('d-M-Y');
    }

    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
    public function activeSubscriptions(){
        return $this->subscriptions()->whereIn('status',['active' ,'trial']);
    }
    public function currentSubscription(){
        return $this->subscriptions->last();
    }

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
    
}
