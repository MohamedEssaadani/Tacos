@extends('partials.client-side.master')

@section('content')

@include('partials.client-side.header-2')

<section style="background:#f8f9fa;">
    <div class="container">
        <div class="row">
            @foreach($tacosItems as $tacos)
            <div class="col-lg-3 col-md-4  col-sm-6 ">
                <div class="center-text mb-30">
                    <div class="ïmg-200x mlr-auto pos-relative">
                        <h6 class="ribbon-cont">
                            <div class="ribbon primary"></div><b>OFFER</b>
                        </h6>
                        <img src="{{asset('assets/img/tacos/'.$tacos->image)}}" alt="{{$tacos->image}}">
                    </div>
                    <h5 class="mt-20">{{$tacos->tacos_name}}</h5>
                    <h4 class="mt-5"><b>${{$tacos->tacos_price}}</b></h4>
                    <h6 class="mt-20"><a href="#" class="btn-brdr-primary plr-25"><b>Order Now</b></a></h6>
                </div>
                <!--text-center-->
            </div><!-- col-md-3 -->
            @endforeach


        </div>
        {{$tacosItems->links()}}
    </div>
</section>

@endsection