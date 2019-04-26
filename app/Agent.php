<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    /* Default values */
    protected $attributes = [
        'first_name' => '',
        'last_name' => '',
        'phone' => '',
        'email' => '',
        'active' => ''
    ];

    public function company() {

        return $this->belongsTo('App\Company');
    }
    
}
