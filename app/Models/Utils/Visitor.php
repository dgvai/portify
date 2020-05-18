<?php

namespace App\Models\Utils;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = ['ip','page'];

    public static function track($ip,$page)
    {
        if(!self::exists($ip))
        {
            self::create([
                'ip' => $ip,
                'page' => $page
            ]);
        }
    }

    public function scopeToday($q)
    {
        return $q->whereBetween('created_at',[
            Carbon::now()->startOfDay(),
            Carbon::now()->endOfDay()
        ])->orderBy('id','desc');
    }

    public function scopeRange($q,$start,$end)
    {
        return $q->whereBetween('created_at',[
            Carbon::parse($start)->startOfDay(),
            Carbon::parse($end)->endOfDay()
        ])->orderBy('id','desc');
    }

    private static function exists($ip)
    {
        return self::where('ip',$ip)->whereDate('created_at',Carbon::now())->count() > 0 ? true : false;
    }
}
