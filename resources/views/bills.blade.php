@extends('layouts.app')


@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3  ">
        <h1 class="h2">Bills</h1>

    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Reason</th>
                <th>Amount</th>

            </tr>
            </thead>
            <tbody>


                @foreach ($all_bills as $bill)
                    <tr>
                    <td>{{  $loop->index }}</td>
                    <td>{{  $bill->cat_name }}</td>
                    <td>{{  $bill->amount }}</td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>
@endsection

