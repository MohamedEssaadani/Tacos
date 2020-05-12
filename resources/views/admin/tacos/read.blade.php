@extends("partials.admin.master")

@section("content")

@include("partials.admin.page-header",
[
'page_header_title' => 'View Tacos',
'item'=> 'Tacos',
'item_route' =>'/tacos'
])

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>View Tacos</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <label class="col-sm-6 col-lg-6 col-form-label">Tacos Id</label>
                    <label class="col-sm-6 col-lg-6 col-form-label">{{$tacos->tacos_id}}</label>

                    <label class="col-sm-6 col-lg-6 col-form-label">Tacos Name</label>
                    <label class="col-sm-6 col-lg-6 col-form-label">{{$tacos->tacos_name}}</label>

                    <label class="col-sm-6 col-lg-6 col-form-label">Tacos Price</label>
                    <label class="col-sm-6 col-lg-6 col-form-label">${{$tacos->tacos_price}}</label>

                    <label class="col-sm-6 col-lg-6 col-form-label">Tacos Image</label>
                    <div class="col-sm-6 col-lg-6">
                        <img src="{{asset('assets/img/tacos/'.$tacos->image)}}" style="height:200px; width:200px;"
                            alt="{{$tacos->image}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection