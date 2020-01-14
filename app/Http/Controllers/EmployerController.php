<?php

namespace App\Http\Controllers;

use App\Company;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployerController extends Controller
{

    protected function EmployerRegister()
    {
        $user = User::create([
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type'=>request('user_type'),
        ]);
        company::create([
            'user_id'=>$user->id,
            'cname' =>request('cname'),
            'slug'    =>Str::slug(request('cname'))
        ]);
        return redirect()->to('login')->session()->flash('msg',
            'Please verify your email by click the link sent your email address');
    }
    //
}
