@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <form action="{{route('alljobs')}}" method="GET">

            <div class="form-inline">

                <div class="form-group">
                <label for="">Keyword &nbsp;</label>
                    <input type="text" name="title" placeholder="Keyword" class="form-control">
                    &nbsp;&nbsp;
                </div>
                <div class="form-group">
                    <label for="">Type &nbsp;</label>
                    <select name="type" id="type" class="form-control">
                        <option value="">Select</option>
                        <option value="full time">Fall time</option>
                        <option value="part time">Part time</option>
                        <option value="casual">Casual</option>

                    </select>
                    &nbsp;&nbsp;
                </div>
                <div class="form-group">
                    <label for="">Category &nbsp;</label>
                    <select name="category" id="category" class="form-control">
                        @foreach(App\category::all() as $cat)
                            <option value="">Select</option>
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                    &nbsp;&nbsp;
                </div>

                <div class="form-group">
                    <label for="">address &nbsp;</label>
                    <input type="text" name="title" placeholder="Address" class="form-control">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </div>

                <div class="form-group">
                <button class="btn btn-outline-success" >Search</button>
                </div>

            </div>
            </form>






            <table class="table">
                <thead>

                </thead>

                <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td>
                            @if(empty($job->logo))
                                <img src="{{asset('/avatar/man.jpg')}}" width="80" >
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
           {{$jobs->links()}}
        </div>

        <br><br>

    </div>



@endsection

<style>
    .fa{
        color:#4183D7;
    }
</style>
