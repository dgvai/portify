<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class UserGallery extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['image_url'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/user/gallery/'.$this->image);
    }

    public static function vanish($id)
    {
        $gallery = self::find($id);
        unlink(public_path('storage/user/gallery').'/'.$gallery->image);
        return $gallery->delete() ? true : false;
    }
}
