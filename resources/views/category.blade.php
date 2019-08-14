@extends('layouts.app')
@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 border-bottom">
    <h1 class="h2">{{$title}}</h1>
    <div class="toolbar_date_range ">

        <button class="btn btn-sm  mr-1 no-bg_btn"> <strong>FROM</strong> </button>

        <button class="btn btn-sm btn-outline-secondary" id="start_date">
            <i class="far fa-calendar-alt" aria-hidden="true"></i>
            
            {{date('Y-m-d ', strtotime($start_time))   }}
        </button>

        <button class="btn btn-sm  ml-4 no-bg_btn"> <strong>TO</strong> </button>

        <button class="btn btn-sm btn-outline-secondary ml-1 " id="end_date">
            <i class="far fa-calendar-alt" aria-hidden="true"></i>
            
            {{date('Y-m-d ', strtotime($end_time))   }}
        </button>

    </div>

</div>

@include('includes.sum_by_cat')


 
<div class="table-responsive">
    @if( count($each_bill))
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Createad At</th>
                <th>Updated At</th>
                <th>Reason</th>
                <th>Amount</th>
                

            </tr>
        </thead>
        <tbody>

            <?php $total = 0; ?>

            @foreach ($each_bill as $bill)
            <?php $total += $bill->amount; ?>
            <tr>
                <td>{{ $loop->index }}</td>

                <td>   {{date('Y-m-d ', strtotime( $bill->created_at))   }} </td>
                <td>   {{date('Y-m-d ', strtotime( $bill->updated_at))   }} </td>
                <td>{{ $bill->cat_name }}</td>
                <td>{{ $bill->amount }} </td>

               
            </tr>
            @endforeach
            <tr>
                <td> <strong>Total</strong></td>
                <td> </td>
                <td> </td>
                <td>
                    <strong> <?php echo $total  ?></strong></td>
                <td> </td>
            </tr>

        </tbody>
    </table>
    <!-- {{ $each_bill->links() }} -->
    @endif
</div>
 
<script src=" {{asset('public/js/jquery.min.js')}}"></script>
<script src="{{asset('public/js/bootstrap.min.js')}}" crossorigin="anonymous"></script>

@endsection