@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="company-profile">

                @if(!empty($company->cover_photo))
                    <img src="{{asset('cover/cvp.png')}}"  style="width: 100%"; >
                @else
                    <img src="{{asset('uploads/coverphoto')}}/{{$company->cover_photo}}" style="width: 100%" >
                @endif

                <div class="company-desc">
                    <br>
                    @if(!empty($company->logo))
                        <img src="{{asset('/avatar/man.jpg')}}" width="80" >
                    @else
                        <img src="{{asset('uploads/logo')}}/{{$company->logo}}" width="80" >
                    @endif

                    {{Str::limit($company->description,120)}}
                    <h1>{{$company->cname}}</h1>
                    <p>Slogan-{{$company->slogan}}&nbsp;Address-{{$company->address}}&nbsp; Phone-{{$company->phone}}&nbsp;
                        Website-<a href="">{{$company->website}}&nbsp;</a>
                    </p>
                </div>
            </div>

            <table class="table">
                <h1>Recent Jobs</h1>
                <thead>
                <th></th>
                </thead>

                <tbody>
                @foreach($company->job as $job)
                    <tr>
                        <td><img src="{{asset('/avatar/man.jpg')}}" alt="company name" width="80" ></td>
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
    </div>
@endsection
