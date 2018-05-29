<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectorUser extends Model
{
    public function locationinfos()
    {
        return $this->hasMany('App\LocationInfo', 'user_id');
    }

    public function keyboardinfos()
    {
        return $this->hasMany('App\KeyboardInfo', 'user_id');
    }

    public function audioinfos()
    {
        return $this->hasMany('App\AudioInfo', 'user_id');
    }
}
