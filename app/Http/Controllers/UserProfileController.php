<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['seeker','verified']);
         //$this->middleware('seeker',['except'=>array('index','show')]);
    }

    public function index(){
        return view('profiles.index');
    }

    public function update(ProfileRequest $request){
      $user_id = auth()->user()->id;
      profile::where('user_id',$user_id)->update([  //where('user_id(Profile table)',$user_id(users table))

          'address'   =>request('address'),
          'phone_number'   =>request('phone_number'),
          'bio'       =>request('bio'),
          'experience'=>request('experience')

        ]);
        $request->session()->flash('msg','Profile Successfully Updated !');
        return redirect()->back();
    }

    public function coverletter(Request $request){
        $this->validate($request,[
           'cover_latter'=>'required'
        ]);

        $user_id = auth()->user()->id;
        $cover = $request->file('cover_latter')->store('public/files');
        profile::where('user_id',$user_id)->update([
           'cover_latter' =>$cover
        ]);
        $request->session()->flash('msg','Cover Letter Successfully Updated !');
        return redirect()->back();

    }

    public function resume(Request $request){
        $this->validate($request,[
            'resume'=>'required|mimes:pdf,doc,docx|max:20000'
        ]);

        $user_id = auth()->user()->id;
        $resume = $request->file('resume')->store('public/files');
        profile::where('user_id',$user_id)->update([
            'resume' =>$resume
        ]);
        $request->session()->flash('msg','Resume Successfully Updated !');
        return redirect()->back();

    }

    public function avatar(Request $request){
        $this->validate($request,[
            'avatar'=>'required|mimes:png,jpg,jpeg|max:20000'
        ]);

        $user_id = Auth::user()->id;
        if ($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename= time().".".$ext;
            $file->move('uploads/avatar/',$filename);

            profile::where('user_id',$user_id)->update([
                'avatar' =>$filename
            ]);
            $request->session()->flash('msg','Picture Successfully Updated !');
            return redirect()->back();

        }
}
    //
}
