<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function cities()
    {
        return $this->hasMany('App\City', 'department_code', 'code');
    }

    public function region()
    {
        return $this->belongsTo('App\Region', 'region_code', 'code');
    }

    public function tournaments()
    {
        return $this->hasManyThrough('App\City', 'App\Tournament', 'code', 'department_code', 'id', 'city_id');
    }
}
