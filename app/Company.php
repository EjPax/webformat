<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // db table name 
    protected $table = 'companies';

    // default values for each property
    protected $attributes = [
        'country' => 'Italy',
        'address' => 'Viale della Vittoria 13'
    ];

    // this property allows 
    protected $with = ['agents'];

    // accessor methods listed in following array will be appended to the JSON serialization
    protected $appends = ['since'];

    // define relationship with 'agent' entities
    public function agents() {

        return $this->hasMany('App\Agent');
    }

    // setters and getters
    public function setWebsiteAttribute($value){

        if ($value)
            if (substr($value,0,4) == 'http')
                $this->attributes['website'] = $value;
            else
                $this->attributes['website'] = 'http://'.$value;
        
    }

    // custom accessor to retrieve 
    public function getSinceAttribute() {

        return $this->created_at->format('M Y');
    }
}
