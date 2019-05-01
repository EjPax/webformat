<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    // db table
    protected $table = 'agents';

    // Default values foreach property
    protected $attributes = [
        'active' => true
    ];

    // methods listed in 'with' array property will be called at init
    protected $with = [];

    public function company() {

        return $this->belongsTo('App\Company');
    }
    
    public function setFirstNameAttribute($value) {

        $this->attributes['first_name'] = ucwords($value);

    }

    public function setLastNameAttribute($value) {
        
        $this->attributes['last_name'] = ucwords($value);
    
    }
}
