<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaContact extends Model
{
    protected $table="preferred_contact_media";
    protected $fillable = [
        'name' , 'status'
    ];
    public function users()
    {
        return $this->belongsToMany('App\User','preferred_contact_media_users');
    }
    public function admins()
    {
        return $this->belongsToMany('App\Models\Admin','preferred_contact_media_agent');
    }
}
