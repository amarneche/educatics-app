<?php

namespace App\Models;

use App\Traits\Sluggify;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stancl\VirtualColumn\VirtualColumn;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Course extends Model implements HasMedia
{
    use HasFactory;
    use VirtualColumn;
    use InteractsWithMedia;
    use Sluggify;

    protected $guarded=[];

    public static function getCustomColumns(): array {
        return ["title","duration","price","created_by","slug"];
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('cropped-thumb')
            ->crop('crop-center',50,50);
    }


}
