<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class City extends Model
{
    use Searchable;

    public function department()
    {
        return $this->belongsTo('App\Department', 'department_code', 'code');
    }
}
