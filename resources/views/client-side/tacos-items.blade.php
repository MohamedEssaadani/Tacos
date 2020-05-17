@extends('partials.client-side.master')


@section('content')

@include('partials.client-side.header-2')

<section style="background:#f8f9fa;">
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session()->has('success'))
        <div class="alert alert-success">
            {!! session()->get('success') !!}
        </div>
        @endif
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
                    <h5 class="">{{$tacos->tacos_name}}</h5>
                    <h4 class="mt-5"><b>${{$tacos->tacos_price}}</b></h4>
                    <h6 class="mt-20"><a href="{{route('Tacos.addToCart', $tacos->tacos_id)}}"
                            class="btn-brdr-primary plr-25"><b>Add To Cart</b></a></h6>
                </div>
                <!--text-center-->
            </div><!-- col-md-3 -->
            @endforeach

        </div>
        <div class="d-flex">
            <div class="mx-auto">
                {{$tacosItems->links("pagination::bootstrap-4")}}
            </div>
        </div>
    </div>
</section>

@endsection