<!DOCTYPE html>
<html>
@include('includes.head')
<body>

    @include('includes.navbar')

    @yield('content')

{{--signing/singup pages goes here--}}
</body>

<script src=" {{asset('/js/jquery.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}" crossorigin="anonymous"></script>
</html>

