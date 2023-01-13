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

    protected $guarded =[];
    public static function getCustomColumns(): array
    {
        return array_diff(Schema::getColumnListing('invoices'),['data']) ;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($invoice) {
            $invoice_date = date('Ymd');
            $invoice_prefix = 'INV';
            $invoice_counter = Invoice::count() + 1;
            $invoice->invoice_number = $invoice_prefix . '-' . $invoice_date . '-' . str_pad($invoice_counter, 5, '0', STR_PAD_LEFT);
        });
    }
    
    public function payments(){
        return $this->morphMany(Payment::class,'paymentable');
    }


    //helpers 
    public static function generate($invoice_prefix, $invoice_date, $invoice_counter) {
        $invoice_number = $invoice_prefix.'-'.$invoice_date.'-'.str_pad($invoice_counter, 5, '0', STR_PAD_LEFT);
        return $invoice_number;
    }

}
