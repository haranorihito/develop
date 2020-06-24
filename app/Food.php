<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'shopname' => 'required',
        'address' => 'required',
        'genre' => 'required',
        'comment' => 'required',
    );

    public function favorite_users()
    {
        return $this->belongsToMany(User::class,'favorites','food_id','user_id')->withTimestamps();
    }

}
