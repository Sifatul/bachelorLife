@extends('layouts.index')
@section('title')
Signin
@endsection

@section('content')
<div class=" col-md-4 mt-4 ml-auto mr-auto form_parent">
    <form class="px-4 py-3 form-container " method="post" action="{{'signin'}}">
        <h3>Login</h3>
        <hr> 
        @if ($errors->has('message'))  
        <div class="alert alert-danger">  {{ $errors->first('message')}}</div>
        @endif
        @if (session("auth_failed"))
        <div class="alert alert-danger">
            {{session("auth_failed")[0] }}
        </div>
        @elseif ( session('status') )
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        

        <div class="form-group {{$errors->has('email')? 'has-error':''}}">
            <label class="py-1" for="exampleDropdownFormEmail1">Email address</label>
            <input type="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" name="email" id="exampleDropdownFormEmail1" placeholder="email@example.com" value="{{Request::old('email') }}">
            <div class="invalid-feedback">{{$errors->first('email')}}</div>
        </div>
        <div class="form-group {{$errors->has('password')? 'has-error':''}}">
            <label class="py-1" for="exampleDropdownFormPassword1">Password</label>
            <input type="password" name="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" id="exampleDropdownFormPassword1" placeholder="Password" value="{{Request::old('password') }}">
            <div class="invalid-feedback">{{$errors->first('password')}}</div>
        </div>
        <div class="form-check">
            <input type="checkbox" name="remember_me" class="form-check-input" id="dropdownCheck">
            <label  class="form-check-label py-1" for="dropdownCheck">
                Remember me
            </label>
        </div>
        <button type="submit" class="btn btn-primary">
            <span class="px-1">Sign in</span>
            <!-- <i class="fas fa-sign-in-alt"></i> -->
        </button>
        @csrf
        <div class="form-group">
            <div class="dropdown-divider"></div>
            <div class="">Already have account? <a href="{{url('/signup')}}">Sign Up</a></div>
            <a class=" " href="{{url('/password_reset')}}">Forgot password?</a>
        </div>
    </form>




    <!-- <a class="dropdown-item" href="#">Forgot password?</a> -->

</div>

@endsection