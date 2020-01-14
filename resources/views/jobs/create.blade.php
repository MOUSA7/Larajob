@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (Session::has('msg'))
                    <div class="alert alert-success">{{ Session::get('msg') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">Create New Job</div>
                    <div class="card-body">

                        <form action="{{route('job.store')}}" method="post">
                            @csrf

               <div class="form-group">
                   <label for="title">Title</label>
                   <input type="text" name="title" class="form-control" value="{{old('title')}}">
                   @if($errors->has('title'))
                       <div class="error" style="color: red">
                           {{$errors->first('title')}}
                       </div>
                   @endif
               </div>



                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control">
                        @foreach(App\category::all() as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                    </select>
                    @if($errors->has('category'))
                        <div class="error" style="color: red">
                            {{$errors->first('category')}}
                        </div>
                    @endif
                </div>


                        <div class="form-group">
                            <label for="category">Type :</label>
                            <select name="type" id="type" class="form-control">

                                <option value="full time">Fall time</option>
                                <option value="part time">Part time</option>
                                <option value="casual">Casual</option>

                            </select>
                            @if($errors->has('type'))
                                <div class="error" style="color: red">
                                    {{$errors->first('type')}}
                                </div>
                            @endif
                        </div>

                            <div class="form-group">
                                <label for="status">Status :</label>
                                <select name="status" id="status" class="form-control">

                                    <option value="1">Active</option>
                                    <option value="0">Not Active</option>

                                </select>
                                @if($errors->has('status'))
                                    <div class="error" style="color: red">
                                        {{$errors->first('status')}}
                                    </div>
                                @endif
                            </div>


                <div class="form-group">
                    <label for="role">Role :</label>
                    <textarea name="roles" class="form-control"></textarea>
                    @if($errors->has('roles'))
                        <div class="error" style="color: red">
                            {{$errors->first('roles')}}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" name="description" class="form-control" value="{{old('description')}}" ></textarea>
                    @if($errors->has('description'))
                        <div class="error" style="color: red">
                            {{$errors->first('description')}}
                        </div>
                    @endif
                </div>

                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" name="position" class="form-control" value="{{old('position')}}">
                            @if($errors->has('position'))
                                <div class="error" style="color: red">
                                    {{$errors->first('position')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" value="{{old('address')}}">
                            @if($errors->has('address'))
                                <div class="error" style="color: red">
                                    {{$errors->first('address')}}
                                </div>
                            @endif
                        </div>

                            <div class="form-group">
                                <label for="date">Date :</label>
                                <input type="text" name="last_date" id="datepicker" class="form-control" value="{{old('date')}}">
                            </div>

                  <div class="for-group">
                    <button class="btn btn-success col-md-2">Create Job</button>
                  </div>
                        </form>
                 </div>

                </div>
            </div>
        </div>
    </div>
@endsection
