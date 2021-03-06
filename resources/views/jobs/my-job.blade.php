@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <table class="table">
                            <h1>Recent Jobs</h1>
                            <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            </thead>

                            <tbody>
                            @foreach($jobs as $job)
                                <tr>
                                    <td>    @if(empty(Auth::user()->company->logo))
                                            <img src="{{asset('avatar/man.jpg')}}" width="50"  >
                                        @else
                                            <img src="{{asset('logo')}}/{{Auth::user()->company->logo}}" width="50" >
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
                                        <a href="{{route('jobs.edit',[$job->id,$job->slug])}}"><button class="btn btn-dark btn-sm">Edit</button></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
