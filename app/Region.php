<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function departements()
    {
        return $this->hasMany('App\Department', 'region_code', 'code');
    }

    public function cities()
    {
        return $this->hasManyThrough('App\City', 'App\Department', 'region_code', 'department_code','code', 'code');
    }
}
