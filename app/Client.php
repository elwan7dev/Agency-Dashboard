<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // mass assignments
    protected $guarded = [];

    /**
     * The services that belong to the client.
     */
    public function services()
    {
        return $this->belongsToMany('App\Service', 'service_client','client_id','service_id')
                    ->withTimestamps();
    }
    
}
