<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Schema;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Stancl\VirtualColumn\VirtualColumn;
use Spatie\Permission\Traits\HasRoles;
use Spatie\QueryBuilder\QueryBuilder;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,VirtualColumn;
    use HasRoles;
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=[];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getCustomColumns(): array
    {
        return array_diff(Schema::getColumnListing('users'),['data']) ;
    }

    public function getFullNameAttribute(){
        return $this->first_name." ".$this->last_name;
    }
    public static function filter(){
        return QueryBuilder::for(User::class)
                ->allowedFilters(array_diff(Schema::getColumnListing('users'),['data']))
                ->get();
    }

    public function eligibleForFreeTrial(){
        // check if he has an active Tenant model where he's the owner.
        
        return is_null(Tenant::where('data->owner_id',$this->id)->first());
    }
    public function isTenant(){
        return $this->hasRole([Role::TENANT]);
    }

    public function avatarUrl(){
        return $this->getFirstMediaUrl('avatar','thumb')=="" ? config('default_avatar',env("DEFAULT_AVATAR")):$this->getFirstMediaUrl('avatar','thumb');
    }
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->crop('crop-center',200,200);
    }
}

