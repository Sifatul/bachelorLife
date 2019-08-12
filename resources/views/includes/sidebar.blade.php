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

            <li class="nav-item">
                <a class="nav-link {{ Request::path() == 'archive' ? ' active' : ' ' }} " href="{{url('archive')}}">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    Archive
                </a>
            </li>
        </ul>
    </div>
</nav>