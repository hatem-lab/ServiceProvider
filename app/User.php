<?php

namespace App;


use App\Models\Order;
use App\Models\ServiceProviderProfile;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Ramsey\Uuid\Uuid;


class User extends Authenticatable implements JWTSubject
{
    const image_directory = 'users';



    /*
       * @var array
       */
   protected $guarded=[];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function user_provider_profile()
    {
        return $this->belongsToOne(ServiceProviderProfile::class, 'user_id');
    }
    public function many_media_admin()
    {
        return $this->belongsToMany('App\Models\MediaContact','preferred_contact_media_agent');
    }
    public function sections()
    {
        return $this->belongsToMany('App\Models\Section','Section_Admin');
    }
}
