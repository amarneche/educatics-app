<?php
namespace App\Traits;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
trait Sluggify {

    public static function booted(){
        static::creating(function($model){
            $model->slug= static::makeSlug($model->title);
        });
        static::updating(function($model){
            if($model->isDirty('slug')){
                //check if the new slug is unique ! 
                $otherModel= static::where('slug', $model->slug)->first();
                //if is_null($otherModel) just proceed with update ! else  make a new slug
                if(!is_null($otherModel)    && $otherModel->id != $model->id){
                 // make up a new slug 
                 $model->slug = static::makeSlug($model->title);
                 
                }
            }

          
        });

        
    }  

    public static function makeSlug($str){
        $str=Str::lower($str);
        $slug=Str::slug($str);
        //check uniqueness!
        while(static::where('slug',$slug)->get()->count() >0){
            $slug=Str::slug($slug.rand(1,1000));
        }
        return $slug;
        
    }
    public function getRouteKeyName(){
        
        return 'id';
    }     


}
