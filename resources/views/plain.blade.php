@extends('layouts.index')
@section('content')
<div class="form_parent ">
    <div class="m-auto ">
        <h1 class="py-3">{{ $message }}</h1>
        <p class="py-1">
            Before you can join {{ config('app.name') }}, we need you to verify your email address.</p>

            <p>
            An email containing verification instructions was sent to <strong>{{ $email }}</strong>.
        </p>
        <!-- <form class="text-gray" action="" accept-charset="UTF-8" method="post"> -->
            <!-- <input name="utf8" type="hidden" value="✓"> -->
            <!-- <input type="hidden" name="authenticity_token" value="9rZbpfWSSC16ZV+ph2lFnvomKbSv6LVsSLKuNQChtelW0drltFaWFflUVK/lTC/w/fFTCyfjKYXe1Oacwmg+PA=="> -->
            <strong>Didn’t get the email?</strong>
            <a href="{{ $resend_link }}">Resend verification email</a>   or else please verify and <a href="{{ route('login') }}">login</a>.
        <!-- </form> -->
    </div>
</div>

@endsection

