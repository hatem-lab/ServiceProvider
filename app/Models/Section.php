<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table="sections";
    protected $guarded=[];

    public function admins()
    {
        return $this->belongsToMany('App\Models\Admin','Section_Admin');
    }
}
