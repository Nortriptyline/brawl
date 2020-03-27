<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class City extends Model
{
    use Searchable;

    public function toSearchableArray()
    {
        // $array = $this->toArray()   ;

        $array = [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'zip_code' => $this->zip_code
        ];

        return $array;
    }

    public function department()
    {
        return $this->belongsTo('App\Department', 'department_code', 'code');
    }
}
