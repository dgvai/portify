<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    public $timestamps = false;

    public static function get($key)
    {
        return self::where('key',$key)->first()->value;
    }

    public static function set($key,$val)
    {
        $cfg = self::where('key',$key)->first();
        $cfg->value = $val;
        return $cfg->save();
    }
}
