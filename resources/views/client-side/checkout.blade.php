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
        <div class="row">
            <form class="col-md-8" action="{{route('Checkout.store')}}" method="post">
            @csrf
                <div class="row form-group">
                    <div class="col-md-2">
                      <label>Full Name</label>
                    </div>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="billing_name">
                    </div>
                </div>

                    <div class="row form-group">
                    <div class="col-md-2">
                      <label>Address</label>
                    </div>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="billing_address">
                    </div>
                </div>

                    <div class="row form-group">
                    <div class="col-md-2">
                      <label>Phone</label>
                    </div>
                    <div class="col-md-6">
                      <input type="text" class="form-control mb-4" name="billing_phone">
                     <input type="submit" value="Order" class="btn btn-primary" style="float:right;">
                    </div>
                </div>
            </form>
                
            <div class="col-md-4">
                Here Items
            </div>
        </div>
    </div>
</section>
@endsection