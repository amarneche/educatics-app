<?php
namespace App\MediaLibrary;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\DefaultPathGenerator;


class CustomMediaPathGenerator extends DefaultPathGenerator{
    
        protected function getBasePath(Media $media): string
        {
            $prefix= is_null(tenant()) ? "central" : tenant()->id;
            $ds=DIRECTORY_SEPARATOR;
            return $prefix . $ds . $media->getKey();
        }
}
