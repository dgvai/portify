<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    protected $fillable = ['title','image','link', 'description'];
    protected $appends = ['image_url'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/user/projects/'.$this->image);
    }

    public static function vanish($id)
    {
        $project = self::find($id);
        unlink(public_path('storage/user/projects/'.$project->image));
        return $project->delete() ? true : false;
    }
}
