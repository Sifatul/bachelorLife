@extends('layouts.app')
@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="toolbar_date_range ">

        <button class="btn btn-sm  mr-1 no-bg_btn"> <strong>FROM</strong> </button>

        <button class="btn btn-sm btn-outline-secondary" id="start_date">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            {{date('Y-m-d ', strtotime($start_time))   }}
        </button>

        <button class="btn btn-sm  ml-4 no-bg_btn"> <strong>TO</strong> </button>

        <button class="btn btn-sm btn-outline-secondary ml-1 " id="end_date">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            {{date('Y-m-d ', strtotime($end_time))   }}
        </button>

    </div>

</div>

<div class="row pb-0  ">
    @if($individual_sum_bills)
    @foreach ($individual_sum_bills as $single_sum)
    <div class="card mt-2">
        <div class="card-body card-body-dashboard">
            @switch($single_sum->cat_name)
            @case('Rent')
            <i class="fa fa-home" aria-hidden="true"></i>
            @break
            @case('Electricity')
            <i class="fa fa-plug" aria-hidden="true"></i>
            @break
            @case('Gas')
            <i class="fa fa-fire" aria-hidden="true"></i>
            @break
            @case('Food')
            <i class="fa fa-cutlery" aria-hidden="true"></i>
            @break
            @case('Mobile')
            <i class="fa fa-mobile" aria-hidden="true"></i>
            @break
            @case('Internet')
            <i class="fa fa-globe" aria-hidden="true"></i>
            @break
            @case('Other')
            <i class="fa fa-random" aria-hidden="true"></i>
            @break
            @case('Shopping')
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            @break
            @endswitch

            <h5 class="card-title"> {{$single_sum->cat_name}}</h5>
            <p class="card-text"> {{$single_sum->total}} .tk</p>
        </div>
    </div>
    @endforeach
    @endif

</div>


<div class="mt-4 mb-2">
    <!-- {{-- <div class="btn-group mr-2">
              <button class="btn btn-sm btn-outline-secondary">Share</button>
              <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div> --}} -->
    <button class="btn btn-sm btn-outline-secondary " data-toggle="modal" data-target="#addExpenseModal">
        <i class="fa fa-plus" aria-hidden="true"></i>
        Add Expense
    </button>
</div>
<div class="table-responsive">
    @if( count($each_bill))
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Reason</th>
                <th>Amount</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>

            <?php $total = 0; ?>

            @foreach ($each_bill as $bill)
            <?php $total += $bill->amount; ?>
            <tr>
                <td>{{ $loop->index }}</td>

                <td>
                    {{date('Y-m-d ', strtotime( $bill->created_at))   }} </td>
                <td>{{ $bill->cat_name }}</td>
                <td>{{ $bill->amount }} </td>

                <td>
                    <i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#exampleModal" data-expense-cat_id="{{  $bill->cat_id }}" data-expense-amount="{{  $bill->amount }}" data-expense-id="{{  $bill->id }}">
                    </i>
                    <a href="{{ url('/delete_bill/'.$bill->id) }}">
                        <i class="fa fa-trash-o ml-2" aria-hidden="true"></i>
                    </a>

                </td>
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
   
        {{ $each_bill->links() }}
    @endif
</div>
@include('includes.modal.new_expense')
@include('includes.modal.edit_expense')
<script src=" {{asset('public/js/jquery.min.js')}}"></script>
<script src="{{asset('public/js/bootstrap.min.js')}}" crossorigin="anonymous"></script>

@endsection