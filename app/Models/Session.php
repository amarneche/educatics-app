<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\VirtualColumn\VirtualColumn;

class Session extends Model
{
    use HasFactory;
    use VirtualColumn;

    public static function getCustomColumns(): array{
        return ['starting_date','ending_date','course_id'];
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
