<?php

namespace App\Models\System;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $fillable = ['email', 'name', 'message'];

    public function scopeNew($q)
    {
        return $q->where('seen',0)->orderBy('id','desc');
    }

    public function scopeRange($q, $start, $end)
    {
        return $q->whereBetween('created_at',[
            Carbon::parse($start)->startOfDay(),
            Carbon::parse($end)->endOfDay()
        ])->orderBy('id','desc');
    }

    public function makeSeen()
    {
        $this->seen = 1;
        $this->save();
    }
}
