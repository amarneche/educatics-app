<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\VirtualColumn\VirtualColumn;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Course extends Model implements HasMedia
{
    use HasFactory;
    use VirtualColumn;
    use InteractsWithMedia;

    protected $guarded=[];

    public static function getCustomColumns(): array {
        return ["title","duration","price","cover_photo","created_by"];
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }


}
