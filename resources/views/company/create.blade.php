@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                @if(empty(Auth::user()->company->logo))
                    <img src="{{asset('avatar/man.jpg')}}" width="100" style="width: 100%"; >
                @else
                    <img src="{{asset('logo')}}/{{Auth::user()->company->logo}}" width="100%" style="width: 100%"; >
                @endif
                <br>
                <form action="{{route('company.logo')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">Update Logo</div>
                        <div class="card-body">
                            <input type="file"   name="logo">
                            <br>
                            <button class="btn btn-success float-right" name="submit">Update</button>
                            @if($errors->has('logo'))
                                <div class="error" style="color: red">
                                    {{$errors->first('logo')}}
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
                    <div class="card-header">Updated Your Company Information</div>
                    <form action="{{route('company.store')}}" method="post">@csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address"
                                       value="{{Auth::user()->company->address}}">
                                @if($errors->has('address'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('address')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" name="phone"
                                       value="{{Auth::user()->company->phone}}">
                                @if($errors->has('phone'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('phone')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">WebSite</label>
                                <input type="text" class="form-control" name="website"
                                       value="{{Auth::user()->company->website}}">
                                @if($errors->has('website'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('website')}}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="">Slogan</label>
                                <input type="text" class="form-control" name="slogan"
                                       value="{{Auth::user()->company->slogan}}">
                                @if($errors->has('slogan'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('slogan')}}
                                    </div>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description">
                                {{Auth::user()->company->description}}
                            </textarea>
                                @if($errors->has('description'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('description')}}
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
                    <div class="card-header">About Your Company</div>
                    <div class="card-body">
                        <p>Company      : {{Auth::user()->company->cname}}</p>
                        <p>Address      : {{Auth::user()->company->address}}</p>
                        <p>Phone        : {{Auth::user()->company->phone}}</p>
                        <p>Website      : <a href="#">{{Auth::user()->company->website}}</a></p>
                        <p>Slogan       : {{Auth::user()->company->slogan}}</p>
                        <p>Company Page :<a href="company/{{Auth::user()->company->slug}}">View</a></p>
                    </div>

                <form action="{{route('cover.photo')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">Update Cover Latter</div>
                        <div class="card-body">
                            <input type="file"   name="cover_photo">
                            <br>
                            <button class="btn btn-success float-right" name="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>



        </div>
    </div>
    </div>
@endsection
