<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tsetting extends Model
{
    public function tournament()
    {
        return $this->belongsTo('App\Tournament');
    }
}
