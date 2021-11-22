<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ServiceProviderProfile extends Model
{
    protected $table="service_provider_profile";
    protected $guarded=[];

    public function user_provider()
    {
        return $this->belongsToOne(User::class, 'user_id');
    }

}
