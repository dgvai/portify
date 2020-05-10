<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $fillable = ['first_name','last_name','current_work','graduated','bio'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
