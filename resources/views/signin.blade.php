@extends('layouts.index')
@section('title')
    Signin
@endsection

@section('content')


    <div class="main_cover   ">
        <div class="form-container col-md-3 ml-auto ">
            <form class="px-4 py-3" method="post" action="{{'signin'}}">
                <h3>Sign In</h3>
                <hr>
                @if (session("auth_failed"))
                    <div class="alert alert-danger">
                        {{session("auth_failed")[0] }}
                    </div>
                @endif
                <div class="form-group {{$errors->has('email')? 'has-error':''}}">
                    <label for="exampleDropdownFormEmail1">Email address</label>
                    <input type="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" name="email"
                           id="exampleDropdownFormEmail1" placeholder="email@example.com"
                           value="{{Request::old('email') }}">
                    <div class="invalid-feedback">{{$errors->first('email')}}</div>
                </div>
                <div class="form-group {{$errors->has('password')? 'has-error':''}}">
                    <label for="exampleDropdownFormPassword1">Password</label>
                    <input type="password" name="password"
                           class="form-control {{$errors->has('password')?'is-invalid':''}}"
                           id="exampleDropdownFormPassword1" placeholder="Password"
                           value="{{Request::old('password') }}">
                    <div class="invalid-feedback">{{$errors->first('password')}}</div>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="dropdownCheck">
                    <label class="form-check-label" for="dropdownCheck">
                        Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">
                    <span class="px-1">Sign in</span>
                    <i class="fas fa-sign-in-alt"></i>
                </button>
                @csrf
            </form>
            <div class="dropdown-divider"></div>
            <div class="dropdown-item">Already have account? <a href="{{url('/signup')}}">Sign Up</a></div>
            <a class="dropdown-item" href="#">Forgot password?</a>

        </div>
    </div>





@endsection
