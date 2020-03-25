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
}
