<header>
        <nav class="navbar navbar-dark navbar-static-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0"
               href="{{  Auth::check()? url('/'): '' }}">  {{ config('app.name') }}</a>
            {{--<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">--}}
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    @if( Auth::check())
                        <div class="dropdown header_dropdown">
                            <i class="fa fa-user" id="signOutButton" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false"></i>
                            <div class="dropdown-menu" aria-labelledby="signOutButton">

                                <a class="nav-link dropdown-item  px-2" href="{{url('logout')}}">
                                    <i class="fas fa-sign-out-alt  fw6" title="Log Out"></i>
                                    <span class="my-2 my-sm-0 ">Logout</span>
                                </a>
                                {{-- <a class="nav-link dropdown-item  px-2" href="{{url('settings')}}">
                                    <i class="fas fa-cogs" title="Settings"></i>
                                    <span class="my-2 my-sm-0"> Settings</span>

                                </a> --}}
                            </div>
                        </div>
                    @endif

                </li>
            </ul>
        </nav>
        {{--<nav class="navbar navbar-expand-lg navbar-light bg-light">--}}

        {{--<a class="navbar-brand mb-0 h1" href="{{  Auth::check()? url('/home'): '' }}">{{ config('app.name') }}</a>--}}
        {{--@if(Auth::check())--}}
        {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"--}}
        {{--aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
        {{--</button>--}}
        {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"--}}
        {{--aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
        {{--<span class="navbar-toggler-icon"></span>--}}
        {{--</button>--}}

        {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
        {{--<ul class="navbar-nav mr-auto">--}}
        {{--<li class="nav-item active">--}}
        {{--<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>--}}
        {{--</li>--}}
        {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="#">Link</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item">--}}
        {{--<a class="nav-link disabled" href="#">Disabled</a>--}}
        {{--</li>--}}
        {{--</ul>--}}

        {{--</div>--}}
        {{--<div class="form-inline my-2 my-lg-0">--}}
        {{--<a href="{{url('logout')}}">--}}

        {{--<span class="my-2 my-sm-0 px-2">Logout</span>--}}
        {{--<i class="fas fa-sign-out-alt  fw6" title="Log Out"></i>--}}
        {{--</a>--}}

        {{--<span class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</span>--}}
        {{--</div>--}}
        {{--@endif--}}


        {{--</nav>--}}
   


</header>