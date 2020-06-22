<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class UserTitle extends Model
{
    protected $fillable = ['title'];
    
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public static function vanish($id)
    {
        $title = self::find($id);
        return $title->delete() ? true : false;
    }
}
