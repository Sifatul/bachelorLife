<!DOCTYPE html>
<html>
@include('includes.head')
<body>

@include('includes.navbar')
@include('includes.sidebar')

<div class="container-fluid">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        @yield('content')
        {{--                contents goes inside from here--}}

    </main>
</div>
<script src="{{asset('public/js/style.js')}}"></script>
<!-- <script src="{{'public/Dashboard Template for Bootstrap_files/feather.min.js.download'}}"></script> -->
<!-- <script>
    feather.replace()
</script> -->

<!-- Graphs -->
<script src=" {{asset('public/js/jquery.min.js')}}"></script> 
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script src=" {{asset('public/js/style.js')}}"></script> 
   
{{--whole app is controller from here--}}
</body>
</html>



