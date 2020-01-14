<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $fillable = ['user_id','cname','slug','address','phone','logo','cover_photo','slogan','description'];

    public function job(){
        return $this->hasMany('App\job');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function user(){
        return $this->hasMany('App\User');
    }


    //
}
