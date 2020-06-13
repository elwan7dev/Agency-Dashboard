<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * the users that belong to the service
     * 
     */
    public function users()
    {
        return $this->belongsToMany('App\User' , 'service_client','client_id','service_id')
                    ->withTimestamps();
    }

    
} 
