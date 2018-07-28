<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <a class="navbar-brand mb-0 h1" href="{{  Auth::check()? url('/home'): '' }}">{{ config('app.name') }}</a>
            @if(Auth::check())
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                </button>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>
                    </ul>

                </div>
                <div class="form-inline my-2 my-lg-0">
                    <a href="{{url('logout')}}">

                        <span class="my-2 my-sm-0 px-2">Logout</span>
                        <i class="fas fa-sign-out-alt  fw6" title="Log Out"></i>
                    </a>

                    {{--<span class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</span>--}}
                </div>
            @endif


        </nav>
    </div>


</header>