<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tournament extends Model
{
    use SoftDeletes;

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

    public function getStartingTimeAttribute($value)
    {
        return $this->attributes['starting_time'] = substr($value, 0, -3);
    }

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
