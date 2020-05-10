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
}
