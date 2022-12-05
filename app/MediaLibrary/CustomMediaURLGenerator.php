<?php
namespace App\MediaLibrary;

use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\UrlGenerator\DefaultUrlGenerator;


class CustomMediaURLGenerator extends DefaultUrlGenerator {


    // public function getUrl( ) :string {
    //     return Storage::url($this->getPathRelativeToRoot());
    // }

}