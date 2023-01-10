<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Stancl\VirtualColumn\VirtualColumn;

class Subscription extends Model
{
    use HasFactory;
    use VirtualColumn;

    const STATES=['active', 'cancelled', 'expired'];

   


    public static function getCustomColumns(): array
    {
        return array_diff(Schema::getColumnListing('subscriptions'),['data']) ;
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
    
    public function pacakge()
    {
        return $this->belongsTo(Package::class);
    }
    
    public function isValid()
    {
        return $this->status == 'active' && Carbon::now()->lt($this->end_date);
    }
}
