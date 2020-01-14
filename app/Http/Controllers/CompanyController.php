<?php

namespace App\Http\Controllers;

use App\company;
use App\job;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['employer','verified'],['except'=>array('index')]);
    }

    public function index($id,company $company){
        $jobs = job::where('user_id',$id)->get();
        return view('company.index',compact('company'));
    }

    public function create(){
        return view('company.create');
    }
    public function store(Request $request){
        $user_id = auth()->user()->id;
        company::where('user_id',$user_id)->update([  //where('user_id(Profile table)',$user_id(users table))

            'address'     =>request('address'),
            'phone'       =>request('phone'),
            'website'     =>request('website'),
            'description' =>request('description'),
            'slogan'      =>request('slogan')

        ]);
        $request->session()->flash('msg','Profile Successfully Updated !');
        return redirect()->back();
    }

    public function coverphoto(Request $request){
        $user_id = auth()->user()->id;

        if ($request->hasFile('cover_photo')){

            $file = $request->file('cover_photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/coverphoto/',$filename);
            company::where('user_id',$user_id)->update([
               'cover_photo' =>$filename
            ]);
            $request->session()->flash('msg','Cover Photo Successfully Updated !');
            return redirect()->back();
        }
    }




    public function companylogo(Request $request){
        $user_id = auth()->user()->id;

        if ($request->hasFile('logo')){

            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/logo/',$filename);
            company::where('user_id',$user_id)->update([
                'logo' =>$filename
            ]);
            $request->session()->flash('msg','Cover Photo Successfully Updated !');
            return redirect()->back();
        }
    }
    //
}
