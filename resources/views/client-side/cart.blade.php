@extends('partials.client-side.master')
@section('content')
@include('partials.client-side.header-2')
<section style="background:#f8f9fa;">
    <div class="container">
        @if(session('cart'))
        <table class="table table-bordered table-hover">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th></th>
            </thead>
            <tbody>
                @foreach (session('cart') as $id => $details)
                <tr>
                    <td>{{$id}}</td>
                    <td>{{$details['tacos']->tacos_name}}</td>
                    <td>{{$details['tacos']->tacos_price}}</td>
                    <td>{{$details['quantity']}}</td>
                    <td><img src="{{asset('assets/img/tacos/'.$details['tacos']->image)}}"
                            alt="{{$details['tacos']->image}}" style="height:120px; width:120px;"></td>
                    <td style="color:red; font-size:20px; cursor: pointer;">
                        <a href="{{route('Cart.remove', $id)}}">&times;</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button class="btn btn-info" style="float:right;">Checkout</button>
        @else
        <div>
            No Items In Cart!
        </div>
        @endif

    </div>
</section>
@endsection