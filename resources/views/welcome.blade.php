@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <search-component></search-component>
            </div>
            <br>
            <h1>&nbsp;&nbsp;Recent Jobs</h1>
            <table class="table">

                <thead>
                </thead>

                <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td>
                            @if(empty($job->logo))
                                <img src="{{asset('/avatar/sm.jpg')}}" width="80" >
                            @else
                                <img src="{{asset('uploads/logo')}}/{{$job->logo}}" width="80" >
                            @endif

                        </td>
                        <td>Position :{{$job->position}}
                            <br>
                            <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;{{$job->type}}
                        </td>
                        <td> <i class="fa fa-map-marker"></i>&nbsp;Address:{{$job->address}}</td>
                        <td><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;
                            Date :{{$job->created_at->diffForHumans()}}</td>
                        <td><a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                            <button class="btn btn-success btn-sm">Apply</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div>
            <a href="{{route('alljobs')}}">   <button class="btn btn-success btn-lg" style="width: 100%;">
                    Browse all jobs</button></a>
        </div>
        <br><br>
        <h1>Featured Companies</h1>
    </div>
    <div class="container">
        <div class="row">
            @foreach($companies as $company)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">

                    @if(!empty($company->logo))
                       <center> <img src="{{asset('/avatar/logo.jpg')}}" width="50%" ></center>
                    @else
                        <img src="{{asset('uploads/logo')}}/{{$company->logo}}" width="50%" >
                    @endif

                    <div class="card-body">
                        <h5 class="card-title text-center">{{$company->cname}}</h5>
                        <p class="card-text text-center">{{Str::limit($company->description,15)}}</p>
                        <center><a href="{{route('company.index',[$company->id,$company->slug])}}"
                         class="btn btn-outline-primary">Info Company</a></center>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </div>


@endsection

<style>
    .fa{
        color:#4183D7;
    }
</style>
