<?php

namespace App;
use App\company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class job extends Model
{

   // protected $fillable = ['user_id ','company_id','category_id '];

    protected $fillable = ['user_id','company_id','title','slug','description','roles','category_id','position','address','type','status','last_date'];


    public function getRouteKeyName(){
        return 'slug';
    }

    public function company(){
        return $this->belongsTo('App\company');
    }

    public function  users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /*public function  users(){
        return $this->belongsTo('App\User','user_id','id');
    }*/

    public function checkApplication(){           //أفحص اذا موجود في هذا الجدول user_id and job_id
        return DB::table('job_user')->where('user_id',auth()->user()->id)
            ->where('job_id',$this->id)->exists();
    }

    public function  favorites()
    {
        return $this->belongsToMany(User::class, 'favourites',
                         'job_id', 'user_id')
                                       ->withTimestamps();
    }

    public function checkSaved(){           //أفحص اذا موجود في هذا الجدول user_id and job_id
        return DB::table('favourites')->where('user_id',auth()->user()->id)
            ->where('job_id',$this->id)->exists();
    }
    //
}
