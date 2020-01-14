@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                @if(empty(Auth::user()->profile->avatar))
                <img src="{{asset('avatar/man.jpg')}}" width="100%" style="width: 100%"; >
                @else
                    <img src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" width="100%" style="width: 100%"; >
                @endif
                <br><br>
                <form action="{{route('avatar')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">Update Picture</div>
                        <div class="card-body">
                            <input type="file"   name="avatar">
                            <br>
                            <button class="btn btn-success float-right" name="submit">Update</button>
                            @if($errors->has('avatar'))
                                <div class="error" style="color: red">
                                    {{$errors->first('avatar')}}
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-5">
                @if (Session::has('msg'))
                    <div class="alert alert-success">{{ Session::get('msg') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">Updated Your Profile</div>
                    <form action="{{route('profiles.create')}}" method="post">@csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address"
                                   value="{{Auth::user()->profile->address}}">
                            @if($errors->has('address'))
                                <div class="error" style="color: red">
                                    {{$errors->first('address')}}
                                </div>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" name="phone_number"
                                   value="{{Auth::user()->profile->phone_number}}">
                            @if($errors->has('phone_number'))
                                <div class="error" style="color: red">
                                    {{$errors->first('phone_number')}}
                                </div>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="">Experience</label>
                            <textarea class="form-control" name="experience">
                                {{Auth::user()->profile->experience}}
                            </textarea>
                            @if($errors->has('experience'))
                                <div class="error" style="color: red">
                                    {{$errors->first('experience')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Bio</label>
                            <textarea  class="form-control" name="bio">
                                {{Auth::user()->profile->bio}}</textarea>
                            @if($errors->has('bio'))
                                <div class="error" style="color: red">
                                    {{$errors->first('bio')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                           <button class="btn btn-success" name="submit">Update Profile</button>
                        </div>
                    </div>

                    </form>
                </div>

            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">About You</div>
                    <div class="card-body">
                        <p>User       :&nbsp;{{Auth::user()->name}}</p>
                        <p>Email      :&nbsp;{{Auth::user()->email}}</p>
                        <p>Address    :&nbsp;{{Auth::user()->profile->address}}</p>
                        <p>Phone    :&nbsp;{{Auth::user()->profile->phone_number}}</p>
                        <p>Experience :&nbsp;{{Auth::user()->profile->experience}}</p>
                        <p>Bio        :&nbsp;{{Str::limit(Auth::user()->profile->bio,18)}}</p>
                        <p>Member On  :&nbsp;{{date('F d Y',strtotime(Auth::user()->profile->created_at))}}</p>

                        @if(!empty(Auth::user()->profile->cover_latter))
                          <p><a href="{{Storage::url(Auth::user()->profile->cover_latter)}}">Cover Latter </a></p>
                            @else
                            <p class="alert-danger">Please upload Cover Latter</p>
                            @endif

                        @if(!empty(Auth::user()->profile->resume))
                            <p><a href="{{Storage::url(Auth::user()->profile->resume)}}">Resume </a></p>
                        @else
                            <p class="alert-danger">Please upload Resume</p>
                        @endif

                    </div>
                </div>

            <form action="{{route('cover.letter')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">Update Cover Latter</div>
                    <div class="card-body">
                        <input type="file"   name="cover_latter">
                        <br>
                        <button class="btn btn-success float-right" name="submit">Update</button>
                    </div>
                </div>
            </form>

                <form action="{{route('resume')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    <div class="card-header">Update Resume</div>
                    <div class="card-body">
                        <input type="file"  name="resume">
                        <br>
                        <button class="btn btn-success float-right"  name="submit">Update</button>
                    </div>
                </div>
                </form>
            </div>



        </div>
        </div>
    </div>
@endsection
