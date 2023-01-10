<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Stancl\VirtualColumn\VirtualColumn;

class Invoice extends Model
{
    use HasFactory;
    use VirtualColumn;


    public static function getCustomColumns(): array
    {
        return array_diff(Schema::getColumnListing('invoices'),['data']) ;
    }
    public function payments(){
        return $this->morphMany(Payment::class,'paymentable');
    }
}
