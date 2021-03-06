<!DOCTYPE html>
<html>
@include('includes.head')

<body>

    @include('includes.navbar')
    @include('includes.sidebar')

    <div class="container-fluid pb-2">
        <main role="main" class="col-9 col-sm-9 col-md-10 col-lg-10 ml-auto  px-4">
            @yield('content')
            {{-- contents goes inside from here--}}

        </main>
    </div>

    <!-- Graphs -->
    <script src=" {{asset('/js/jquery.min.js')}}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script src=" {{asset('/js/style.js')}}"></script>

    <!-- <script src=" {{asset('public/js/jquery.min.js')}}"></script> -->
    <script src="{{asset('/js/bootstrap.min.js')}}" crossorigin="anonymous"></script>

    {{--whole app is controlled from here--}}
</body>

</html>