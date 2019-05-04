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

    protected $hidden = ['type_id'];

    // methods listed in 'with' array property will be called at init
    protected $with = ['type','agents'];

    // accessor methods listed in 'append' array property will be appended to the JSON serialization
    protected $appends = ['since'];

    public function type() {
        return $this->hasOne('App\CompanyType','id','company_types_id');
    }

    // define relationship with 'agent' entities
    public function agents() {

        return $this->hasMany('App\Agent');
    }

    public function favourite_of() {

        return $this->morphToMany('App\User','favourite');

    }

    // setters and getters (accessor and mutuators)
    /**
     * Set 'website' property with http:// prefix
     *  @param string $value 
     */
    public function setWebsiteAttribute($value){

        if ($value)
            if (substr($value,0,4) == 'http')
                $this->attributes['website'] = $value;
            else
                $this->attributes['website'] = 'http://'.$value;
        
    }

    /**
     * Return 'since' property from audit 'creation' date 
     *
     * @return string
     */
    public function getSinceAttribute() {

        return $this->created_at->format('M Y');
    
    }


}
