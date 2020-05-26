<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    protected $fillable = ['name','percent'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public static function vanish($id)
    {
        $skill = self::find($id);
        return $skill->delete() ? true : false;
    }
}
