@extends("partials.admin.master")

@section("content")

@include("partials.admin.page-header",
[
'page_header_title' => 'View Drink',
'item'=> 'Drinks',
'item_route' =>'/drinks'
])

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>View Drink</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <label class="col-sm-6 col-lg-6 col-form-label">Drink Id</label>
                    <label class="col-sm-6 col-lg-6 col-form-label">{{$drink->drink_id}}</label>

                    <label class="col-sm-6 col-lg-6 col-form-label">Drink Name</label>
                    <label class="col-sm-6 col-lg-6 col-form-label">{{$drink->drink_name}}</label>

                    <label class="col-sm-6 col-lg-6 col-form-label">Drink Type</label>
                    <label class="col-sm-6 col-lg-6 col-form-label">{{$drink->drink_type}}</label>

                    <label class="col-sm-6 col-lg-6 col-form-label">Drink Price</label>
                    <label class="col-sm-6 col-lg-6 col-form-label">${{$drink->drink_price}}</label>

                    <label class="col-sm-6 col-lg-6 col-form-label">Drink Image</label>
                    <div class="col-sm-6 col-lg-6">
                        <img src="{{asset('assets/img/drinks/'.$drink->drink_image)}}"
                            style="height:200px; width:200px;" alt="{{$drink->drink_image}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection