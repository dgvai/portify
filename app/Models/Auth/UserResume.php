<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class UserResume extends Model
{
    protected $fillable = ['file'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function getFilePathAttribute()
    {
        return asset('storage/user/resume/'.$this->file);
    }
}
