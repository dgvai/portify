<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class UserPhoto extends Model
{
    protected $fillable = ['cover'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
