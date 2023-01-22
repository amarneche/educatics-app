<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Stancl\VirtualColumn\VirtualColumn;

class Enrollment extends Model
{
    use HasFactory;
    use VirtualColumn;
    const ACTIVE= "active";
    protected $guarded =[];
    public static function getCustomColumns(): array
    {
        return array_diff(Schema::getColumnListing('enrollments'),['data']) ;
    }

    public function payments(){
        return $this->morphMany(Payment::class,'paymentable');
    }
    public function student(){
        return $this->belongsTo(User::class,'student_id');
    }
    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
    public function batch(){
        return $this->belongsTo(Batch::class);
    }
    public function invoices(){
        return $this->hasMany(Invoice::class);
    }

   
}
