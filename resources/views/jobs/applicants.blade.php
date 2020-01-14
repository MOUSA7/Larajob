@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Applicants</h1>
        <div class="row justify-content-center">
            <div class="col-md-12">

                    <div class="card">
                        @foreach($applicants as $applicant)
                        <div class="card-header"><a href="{{route('jobs.show',[$applicant->id,$applicant->slug])}}"> {{$applicant->title}}</a></div>
                        <div class="card-body">
                                <table class="table" style="width: 100%;">
                                    <thead class="thead-dark">
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>

                                            @if($applicant->users->profile->avatar)
                                                <img src="{{asset('uploads/avatar')}}/{{$applicant->users->profile->avatar}}" width="80">
                                            @else
                                                <img src="{{asset('uploads/avatar/man.jpg')}}" width="80">
                                            @endif

                                            <br>Applied on:{{ date('F d, Y', strtotime($applicant->created_at)) }}
                                        </td>
                                        <td>Name:{{$applicant->users->name}}</td>
                                        <td>Email:{{$applicant->users->email}}</td>
                                        <td>Address:{{$applicant->users->profile->address}}</td>
                                        <td>Gender:{{$applicant->users->profile->gender}}</td>
                                        <td>Experience:{{$applicant->users->experience}}</td>


                                        <td><a href="{{Storage::url($applicant->users->profile->resume)}}">Resume</a></td>

                                        <td><a href="{{Storage::url($applicant->users->profile->cover_letter)}}">Cover</a></td>
                                        <td></td>

                                    </tr>

                                    </tbody>
                                </table>

                        </div><br><br>
                        @endforeach

                    </div>
                    <br>



            </div>

        </div>
    </div>
    </div>
@endsection
