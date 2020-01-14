<?php

namespace App\Http\Controllers;

use App\job;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{

    public function savejob($id){
        $job_id = job::find($id);
        $job_id->favorites()->attach(auth()->user()->id);
        return redirect()->back();
    }

    public function unsavejob($id){
        $job_id = job::find($id);
        $job_id->favorites()->detach(auth()->user()->id);
        return redirect()->back();
    }
    //
}
