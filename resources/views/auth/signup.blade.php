@extends('layouts.index')
@section('title')
Signup
@endsection
@section('content')

<div class="row py-3">
    <div class=" col-10 col-sm-7 col-md-6 col-lg-4 col-xl-3 mt-4 ml-auto mr-auto form_parent">
        <form class="px-4  form-container" method="post" action="{{route('signup')}}" autocomplete="off">
            <h3>Register</h3>
            <hr>
            @if ($errors->has('message'))

            <div class="alert alert-danger"> {{ $errors->first('message')}}</div>
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

            <div class="form-group ">
                <label class="py-1" for="exampleForName">Full Name</label>
                <input type="text" class="form-control {{ $errors->has('name')? 'is-invalid':'' }}" id="exampleForName" name="name" placeholder="Sam" value="{{Request::old('name') }}">
                <div class="invalid-feedback">{{$errors->first('name')}}</div>
            </div>
            <div class="form-group">
                <label class="py-1" for="exampleDropdownFormEmail1">Email address</label>
                <input type="email" class="form-control {{ $errors->has('email')? 'is-invalid':'' }}" id="exampleDropdownFormEmail1" name="email" autocomplete="off" placeholder="email@example.com" value="{{Request::old('email') }}">
                <div class="invalid-feedback">{{$errors->first('email')}}</div>
            </div>
            <div class="form-group">
                <label class="py-1" for="exampleDropdownFormPassword1">Password</label>
                <input type="password" class="form-control {{ $errors->has('password')? 'is-invalid':'' }}" id="exampleDropdownFormPassword1" name="password" autocomplete="new-password" autocomplete="false" placeholder="Password" value="{{Request::old('password') }}">
                <div class="invalid-feedback">{{$errors->first('password')}}</div>
            </div>

            <button type="submit" class="btn btn-primary">Sign up</button>

            @csrf
            <div class="dropdown-divider"></div>
            <div class=" ">Already have an account? <a href="{{url('/')}}">Sign In</a></div>
        </form>

    </div>
</div>

@endsection