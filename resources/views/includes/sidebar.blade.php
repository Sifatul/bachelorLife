<?php
/**
 * Created by PhpStorm.
 * User: sifat
 * Date: 28-Jul-18
 * Time: 6:33 PM
 */
?>
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                
                <a class="nav-link {{ Request::path() == '/' ? ' active' : ' ' }}" href="{{url('/')}}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="{{url('wallet')}}">--}}
{{--                    <i class="fas fa-wallet"></i>--}}
{{--                    Wallet--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link {{ Request::path() == 'bills' ? ' active' : ' ' }} " href="{{url('bills')}}">--}}
{{--                    <i class="fa fa-book" aria-hidden="true"></i>--}}
{{--                    Bills--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>
</nav>
