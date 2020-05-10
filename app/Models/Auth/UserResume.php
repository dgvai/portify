<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class UserResume extends Model
{
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
