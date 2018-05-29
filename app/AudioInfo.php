<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudioInfo extends Model
{
    //Table name
    public $table = 'audio_infos';

    public function collectoruser()
    {
        return $this->belongsTo('App\CollectorUser', 'user_id');
    }
}
