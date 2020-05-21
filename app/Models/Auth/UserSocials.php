<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class UserSocials extends Model
{
    protected $fillable = ['icon', 'name', 'url'];
    
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public static function vanish($id)
    {
        $social = self::find($id);
        return $social->delete() ? true : false;
    }
}
