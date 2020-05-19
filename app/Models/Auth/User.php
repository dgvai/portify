<?php

namespace App\Models\Auth;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * RELATIONS
     */

    public function data()
    {
        return $this->hasOne(UserData::class);
    }

    public function photo()
    {
        return $this->hasOne(UserPhoto::class);
    }

    public function projects()
    {
        return $this->hasMany(UserProject::class);
    }

    public function resume()
    {
        return $this->hasOne(UserResume::class);
    }
    
    public function services()
    {
        return $this->hasMany(UserService::class);
    }
    
    public function titles()
    {
        return $this->hasMany(UserTitle::class);
    }

    /**
     * attributes
     */

    public function getCoverPhotoAttribute()
    {
        return asset('storage/user/cover/'.$this->photo->cover);
    }

    public function getFullNameAttribute()
    {
        return $this->data->first_name . ' ' . $this->data->last_name;
    }

    /**
     * Functions
     */

    public function vanish()
    {
        if($this->data()->exists()) {
            $this->data()->delete();
        }
        if($this->photo()->exists()) {
            $this->photo()->delete();
        }
        if($this->projects()->exists()) {
            $this->projects()->delete();
        }
        if($this->services()->exists()) {
            $this->services()->delete();
        }
        if($this->titles()->exists()) {
            $this->titles()->delete();
        }
        if($this->resume()->exists()) {
            $this->resume()->delete();
        }
        return $this->delete();
    }
}
