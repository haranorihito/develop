<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function favorites()
    {
        return $this->belongsToMany(Food::class, 'favorites', 'user_id', 'food_id')->withTimestamps();
    }

    public function favorite($foodId)
    {
        $exist = $this->is_favorite($foodId);

        if($exist){
            return false;
        }else{
            $this->favorites()->attach($foodId);
            return true;
        }
    }

    public function unfavorite($foodId)
    {
        $exist = $this->is_favorite($foodId);

        if($exist){
            $this->favorites()->detach($foodId);
            return true;
        }else{
            return false;
        }
    }

    public function is_favorite($foodId)
    {
        return $this->favorites()->where('food_id',$foodId)->exists();
    }
    
}
