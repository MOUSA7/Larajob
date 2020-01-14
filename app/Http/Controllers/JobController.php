<?php

namespace App\Http\Controllers;

use App\company;
use App\Http\Requests\JobRequest;
use App\job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware(['employer','verified'],['except'=>array('index','show','apply','all_jobs','SearchJobs')]);
    }

    public function index(){
        $jobs = job::latest()->take(10)->where('status',1)->get();  // خذ عشرة فقط
        $companies = Company::take(8)->get();
        return view('welcome',compact('jobs','companies'));
    }

    public function show($id,job $job){
        $jobs = job::find($id);
        return view('jobs.show',compact('job'));
    }



    public function edit($id){
        $jobs = job::find($id);
        return view('jobs.edit',compact('jobs'));
    }

    public function update(Request $request,$id){
        $jobs = job::findOrFail($id);
        $jobs->update($request->all());

        $request->session()->flash('msg','Job Successfully Updated !');
        return redirect()->back();
    }



             /*====================Notes===========================*/

    public function applicant(){
        $applicants = job::with('users')->where('user_id',auth()->user()->id)->get();
        //return $applicants;
       return view('jobs.applicants',compact('applicants'));
    }

          /*===============================================*/





    public function create(){
        return view('jobs.create');
    }

    public function store(JobRequest $request){
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();  //('Company table','Users Table')
        $company_id  = $company->id;
        job::create([
            'user_id'   =>$user_id,
            'company_id'=>$company_id,
            'address   '=>request('address'),
            'position'  =>request('position'),
            'type'      =>request('type'),
            'title'     =>request('title'),
            'status'    =>request('status'),
            'roles'     =>request('roles'),
            'last_date' =>request('last_date'),
            'category_id'=>request('category'),
            'slug'       =>Str::slug( request('title')),

        ]);

        session()->flash('msg',' Job Successfully Created !');
        return redirect()->back();
    }

    public function myjob(){
        $user_id = auth()->user()->id;
        $jobs = job::where('user_id',$user_id)->get();
        return view('jobs.my-job',compact('jobs'));
    }

    public function apply(Request $request,$id){
        $job_id = job::find($id);
        $job_id->users()->attach(Auth::user()->id);

        session()->flash('msg',' Application Sent Successfully !');
        return redirect()->back();
    }

    public function all_jobs(Request $request){

        $keyword = $request->get('title');
        $type = $request->get('type');
        $category = $request->get('category_id');
        $address = $request->get('address');
        if ($keyword || $type || $category || $address){
            $jobs = job::where('title','LIKE','%'.$keyword.'%')
                        ->orWhere('type',$type)
                        ->orWhere('category_id',$category)
                        ->orWhere('address',$address)
                        ->paginate(5);
            return view('jobs.alljobs',compact('jobs'));

        }else{

            $jobs = job::paginate(8);
            return view('jobs.alljobs',compact('jobs'));

             }
    }

    public function SearchJobs(Request $request){
        $keyword = $request->get('keyword');
        $users = job::where('title','like','%'.$keyword.'%')
                     ->orWhere('position','like','%'.$keyword.'%')
                     ->limit(5)->get();
        return response()->json($users);
    }

    //
}

//attach =>تستخدم لادراج كولوم في جدول وسيط بين جدولين والعلاقة بينهما متعددة
