<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $fillable=['user_id','address','phone_number','dob','gender','bio','experience','avatar'];


    public function user(){
        return $this->belongsTo('App\User');
    }
    //
}
