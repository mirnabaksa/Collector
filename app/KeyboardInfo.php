<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class KeyboardInfo extends Model
{
    //Table name
    public $table = 'keyboard_infos';

    public function collectoruser()
    {
        return $this->belongsTo('App\CollectorUser', 'user_id');
    }
}
