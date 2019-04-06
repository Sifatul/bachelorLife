@extends('layouts.index')

@section('content')
@include('includes.sidebar')
@include('includes.new_expense')
    <div class="container-fluid">
      
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                      {{-- <div class="btn-group mr-2">
                        <button class="btn btn-sm btn-outline-secondary">Share</button>
                        <button class="btn btn-sm btn-outline-secondary">Export</button>
                      </div> --}}
                      <button class="btn btn-sm btn-outline-secondary "  data-toggle="modal" data-target="#addExpenseModal">
                          <i class="fa fa-plus" aria-hidden="true"></i>
                         Add Expense
                      </button>
                    </div>
                  </div>
              
              <div class="row ">
                  <div class="card" >                                                 
                      <div class="card-body card-body-dashboard">
                         <i class="fas fa-wallet" aria-hidden="true"></i> 
                        <h5 class="card-title">Total</h5>     
                        <p class="card-text">500Tk.</p>                       
                      </div>
                    </div> 
                    <div class="card" >                                                 
                      <div class="card-body card-body-dashboard">
                        <i class="fa fa-spinner" aria-hidden="true"></i>
                        <h5 class="card-title">Due</h5>       
                        <p class="card-text">50 Tk.</p>                
                      </div>
                    </div> 
              </div>
                    
                   
            </main>
    </div>
@endsection
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- Icons -->
<script src="{{'public/Dashboard Template for Bootstrap_files/feather.min.js.download'}}"></script>
<script>
    feather.replace()
</script>

<!-- Graphs -->

