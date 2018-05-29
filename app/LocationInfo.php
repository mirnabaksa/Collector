<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationInfo extends Model
{
    //Table name
    public $table = 'location_infos';

    public function collectoruser()
    {
        return $this->belongsTo('App\CollectorUser', 'user_id');
    }

}
