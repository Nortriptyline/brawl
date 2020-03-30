<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = [
        'name',
        'city_id',
        'starting_date',
        'starting_time',
        'address',
        'size',
        'genre',
        'team_size',
        'field',
    ];

    public function creator()
    {
        return $this->belongsTo('App\User');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
