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

    const STATES=['active','trial', 'cancelled', 'expired'];
    protected $dates =['start_date','end_date'];
   

    protected $guarded=[];
    public static function getCustomColumns(): array
    {
        return array_diff(Schema::getColumnListing('subscriptions'),['data']) ;
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
    
    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');
    }
    
    public function isValid()
    {
        return $this->status == 'active' && Carbon::today()->lte($this->end_date);
    }
    public function statusClass(){
        switch ($this->status) {
            case 'active':
                return 'bg-success ';
                break;
            case 'canceled':
                return 'bg-warning ';
                break;
            case 'expired':
                return 'bg-danger';
                break;
            case 'trial':
                return 'bg-info';
                break;
        }

    }
   
    public function payments(){
        return $this->morphMany(Payment::class,'paymentable');
    }
    public function remainingPeriod(){
        return $this->end_date->diffForhumans(Carbon::today());
    }
    public function getRemainingPercentageAttribute(){
        $total_days = $this->start_date->diffInDays($this->end_date);
        $remaining_days = $this->end_date->diffInDays(Carbon::now());
        $remaining_percentage = ($remaining_days / $total_days) * 100;
        
        return number_format($remaining_percentage,2);
    }
}
