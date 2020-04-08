<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Tournament extends Model
{
    use SoftDeletes;
    use Searchable;

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

    public function toSearchableArray()
    {
        // $array = $this->toArray()   ;

        $array = [
            'id' => $this->id,
            'name' => $this->name,
            'genre' => $this->genre,
            'field' => $this->field,
            'team_size' => $this->team_size,
            'city' => $this->city->name,
            // 'department' => $this->city->department->name,
            // 'region' => $this->city->department->region->name
        ];

        return $array;
    }

    public function tsetting()
    {
        return $this->hasOne('App\Tsetting');
    }

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
