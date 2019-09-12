@extends('layouts.index')
@section('title')
Signin
@endsection

@section('content')
<div class=" col-10 col-sm-7 col-md-6 col-lg-4 mt-4 ml-auto mr-auto form_parent">
    <form class="px-4 py-3 form-container " method="post" action="{{ 'password_reset'}}">
        <h3>Reset Password</h3>
        <hr>
       
        @if ($errors->has('message'))          
        <div class="alert alert-info">  {{ $errors->first('message')}}</div>
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
            <label class = "py-1 line-height-normal" for="exampleDropdownFormEmail1">Enter your email address and we will send you a link to reset your password</label>
            <input type="email" required  class="form-control {{$errors->has('email')?'is-invalid':''}}" name="email" id="exampleDropdownFormEmail1" placeholder="email@example.com" value="{{Request::old('email') }}">
            <div class="invalid-feedback">{{$errors->first('email')}}</div>
        </div>       
        
        <button type="submit" class="btn btn-primary">
            <span class="px-1">Send Password</span>
            <!-- <i class="fas fa-sign-in-alt"></i> -->
        </button>
        @csrf
         
    </form>




    <!-- <a class="dropdown-item" href="#">Forgot password?</a> -->

</div>

@endsection