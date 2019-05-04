<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    public function agents() {
        return $this->belongsToMany('App\Agent');
    }
}
