<?php

namespace App\Models;

use App\Traits\Sluggify;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Stancl\VirtualColumn\VirtualColumn;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Str;
use Spatie\QueryBuilder\QueryBuilder;
class Course extends Model implements HasMedia
{
    use HasFactory;
    use VirtualColumn;
    use InteractsWithMedia;
    use Sluggify;

    protected $guarded=[];
    protected $dates =[
        'sale_price_effective_starts','sale_price_effective_ends','created_at','updated_at'
    ];
    public static function getCustomColumns(): array {
        return array_diff(Schema::getColumnListing('courses'),['data']) ;
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->crop('crop-center',100,100);
    }
    public function choosenPrice(){

      return intval(min(array_filter([$this->price,$this->sale_price],fn ($item)=> !is_null($item)))) ;
    }
    public function getDurationFormattedAttribute(){
       
        return $this->duration." ".Str::plural(__($this->duration_unit),$this->duration);
    }

    public static function filter(){
       return QueryBuilder::for(Course::class)
            ->defaultSort('-created_at')
            ->allowedFilters(['title','price','sale_price'])
            ->get();
    }

    public function batches(){
        return $this->hasMany(Batch::class);
    }
    public function enrollments(){
        return $this->hasMany(Enrollment::class);
    }

    public function chosenPrice(){
        if(Carbon::now()->between($this->sale_price_effective_starts,$this->sale_price_effective_ends))
            return   min(array_filter([$this->price,$this->sale_price] ,fn( $item   )=> !is_null($item) || $item!=0 )  );
        else 
            return $this->price;

    }
}
