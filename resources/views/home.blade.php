@extends('layouts.app')

@include('includes.new_expense')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            {{-- <div class="btn-group mr-2">
              <button class="btn btn-sm btn-outline-secondary">Share</button>
              <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div> --}}
            <button class="btn btn-sm btn-outline-secondary " data-toggle="modal" data-target="#addExpenseModal">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Add Expense
            </button>
        </div>
    </div>

    <div class="row pb-2 mb-3">
        @foreach ($individual_sum_bills as $single_sum)



            <div class="card">
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
                    <p class="card-text">  {{$single_sum->total}} .tk</p>
                </div>
            </div>
        @endforeach

    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Reason</th>
                <th>Amount</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>


            @foreach ($all_bills as $bill)
                <tr>
                    <td>{{  $loop->index }}</td>
                    <td>{{  $bill->cat_name }}</td>
                    <td>{{  $bill->amount }}</td>
                    <td>
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td> <strong>Total</strong></td>
                <td> </td>
                <td><strong>{{  $total_bill}}</strong></td>
                <td> </td>
            </tr>


            </tbody>
        </table>
    </div>

@endsection

