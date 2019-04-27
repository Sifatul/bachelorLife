@extends('layouts.index')
@section('title')
    Signup
@endsection
@section('content')

<div class=" form-container ml-auto col-md-3 " >
        <form class="px-4 py-3" method="post" action="{{route('signup')}}" autocomplete="off">
            <h3>Sign Up</h3>
            <hr>

            <div class="form-group ">
                <label for="exampleForName">Full Name</label>
                <input type="text" class="form-control {{ $errors->has('name')? 'is-invalid':'' }}" id="exampleForName" name="name" placeholder="Sam" value="{{Request::old('name') }}">
                <div class="invalid-feedback">{{$errors->first('name')}}</div>
            </div>
            <div class="form-group">
                <label for="exampleDropdownFormEmail1">Email address</label>
                <input type="email" class="form-control {{ $errors->has('email')? 'is-invalid':'' }}" id="exampleDropdownFormEmail1" name="email" autocomplete="off" placeholder="email@example.com" value="{{Request::old('email') }}">
                <div class="invalid-feedback">{{$errors->first('email')}}</div>
            </div>
            <div class="form-group">
                <label for="exampleDropdownFormPassword1">Password</label>
                <input type="password" class="form-control {{ $errors->has('password')? 'is-invalid':'' }}" id="exampleDropdownFormPassword1" name="password" autocomplete="new-password" autocomplete="false" placeholder="Password" value="{{Request::old('password') }}">
                <div class="invalid-feedback">{{$errors->first('password')}}</div>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="dropdownCheck">
                <label class="form-check-label" for="dropdownCheck">
                    Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>

            @csrf
            <div class="dropdown-divider"></div>
        <div class=" " >Already have account? <a href="{{url('/')}}">Sign In</a></div>
        </form>
        
    </div>

@endsection
