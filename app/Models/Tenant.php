<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
}
