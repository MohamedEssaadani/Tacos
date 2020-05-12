@extends("partials.admin.master")

@section("content")

@include("partials.admin.page-header",
[
'page_header_title' => 'View Menu',
'item'=> 'Menus',
'item_route' =>'/menus'
])

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>View Menu</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <label class="col-sm-6 col-lg-6 col-form-label">Menu Id</label>
                    <label class="col-sm-6 col-lg-6 col-form-label">{{$menu->menu_id}}</label>

                    <label class="col-sm-6 col-lg-6 col-form-label">Menu Name</label>
                    <label class="col-sm-6 col-lg-6 col-form-label">{{$menu->menu_name}}</label>

                    <label class="col-sm-6 col-lg-6 col-form-label">Menu Tacos</label>
                    <label class="col-sm-6 col-lg-6 col-form-label">{{$tacos->tacos_name}}</label>

                    <label class="col-sm-6 col-lg-6 col-form-label">Menu Drink</label>
                    <label class="col-sm-6 col-lg-6 col-form-label">{{$drink->drink_name}}</label>

                    <label class="col-sm-6 col-lg-6 col-form-label">Menu Price</label>
                    <label class="col-sm-6 col-lg-6 col-form-label">${{$menu->menu_price}}</label>

                    <label class="col-sm-6 col-lg-6 col-form-label">Menu Price</label>
                    <label class="col-sm-6 col-lg-6 col-form-label">{{ ($menu->with_frite ? 'YES' : 'No') }}</label>

                    <label class="col-sm-6 col-lg-6 col-form-label">Menu Image</label>
                    <div class="col-sm-6 col-lg-6">
                        <img src="{{asset('assets/img/menus/'.$menu->image)}}" style="height:200px; width:200px;"
                            alt="{{$menu->image}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection