<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{
    protected $fillable = ['title', 'icon', 'description'];
    
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function getSvgIconAttribute()
    {
        $type = substr(explode(' ', $this->icon)[0],-1);
        $name = substr($this->icon,7);
        return asset('fa/'.$type.'/'.$name.'.svg');
    }

    public static function vanish($id)
    {
        $service = self::find($id);
        return $service->delete() ? true : false;
    }
}
