<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    protected $fillable = ['title','image','link'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
