<header>
    <nav class="navbar navbar-dark navbar-static-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{   url('/') }}"> {{ config('app.name') }}</a>
        {{--<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">--}}
        <ul class="navbar-nav right-part px-2 py-2">
            <li class="nav-item text-nowrap">
                @if( Auth::check())
                <strong id="nav_user_name" px-2>{{ Auth::user()->name }}</strong>
                <div class="dropdown header_dropdown">
                    <i class="fa fa-user" id="signOutButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <!-- <i class="fas fa-users"></i> -->
                    <div class="dropdown-menu" aria-labelledby="signOutButton">

                        <a class="nav-link dropdown-item  px-2" href="{{url('logout')}}">
                            <!-- <i class="fas fa-sign-out-alt  fw6" title="Log Out"></i> -->
                            <span class="my-2 my-sm-0 ">Logout</span>
                        </a>
                        {{-- <a class="nav-link dropdown-item  px-2" href="{{url('settings')}}">
                        <i class="fas fa-cogs" title="Settings"></i>
                        <span class="my-2 my-sm-0"> Settings</span>

                        </a> --}}
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span  class="fa fa-bars" aria-hidden="true"></span>
                </button>
                @endif

            </li>
        </ul>
    </nav>

    <div class="progress" id="header_progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 10%"></div>
    </div>
</header>