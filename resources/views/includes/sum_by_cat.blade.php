<div class="row pb-0  ">
    @if($individual_sum_bills)
    @foreach ($individual_sum_bills as $single_sum)
    <div class="card mt-2 mr-2 align-self-end">
        <div class="card-body card-body-dashboard">
            @switch($single_sum->cat_name)
            @case('Rent')
            <i class="fas fa-home"></i>
            @break
            @case('Electricity')
            <i class="fa fa-plug" aria-hidden="true"></i>
            @break
            @case('Gas')
            <i class="fa fa-fire" aria-hidden="true"></i>
            @break
            @case('Food')
            <i class="fas fa-utensils"></i>
            @break
            @case('Mobile')
            <i class="fas fa-mobile-alt" aria-hidden="true"></i>
            @break
            @case('Internet')
            <i class="fas fa-wifi"></i>
            @break
            @case('Other')
            <i class="fa fa-random" aria-hidden="true"></i>
            @break
            @case('Shopping')
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            @break
            @endswitch

            <h5 class="card-title pt-1" > {{$single_sum->cat_name}}</h5>
            <p class="card-text"> {{$single_sum->total}} .tk</p>
        </div>
    </div>
    @endforeach
    @endif

</div>
