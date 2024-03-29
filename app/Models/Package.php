<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Stancl\VirtualColumn\VirtualColumn;

class Package extends Model
{
    use HasFactory;
    use VirtualColumn;

    protected $guarded =[];
    public static function getCustomColumns(): array
    {
        return array_diff(Schema::getColumnListing('packages'),['data']) ;
    }
}
