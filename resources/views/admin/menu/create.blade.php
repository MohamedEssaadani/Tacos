@extends("partials.admin.master")

@section("content")

@include("partials.admin.page-header",
[
'page_header_title' => 'Add Menu',
'item'=> 'Menus',
'item_route' =>'/menus'
])

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>Add Menu</h3>
            </div>
            <div class="card-body">
                <form action="{{route('Menus.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">

                        <label class="col-sm-4 col-lg-4 col-form-label">Menu Name</label>
                        <div class="col-sm-8 col-lg-8">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <label class="input-group-text"><i class="ik ik-file-text"></i></label>
                                </span>
                                <input type="text" name="menu_name" value="{{old('menu_name')}}" class="form-control"
                                    required>
                            </div>
                        </div>



                        <label class="col-sm-4 col-lg-4 col-form-label">Tacos</label>
                        <div class="col-sm-8 col-lg-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-clipboard"></i></label>
                                    </span>
                                    <select name="tacos_id" class="form-control" required>
                                        <option value="">--Choose Tacos--</option>
                                        @foreach ($tacosItems as $tacos )
                                        @if($tacos->tacos_id == old('tacos_id'))
                                        <option value="{{$tacos->tacos_id}}" selected>{{$tacos->tacos_name}}</option>
                                        @else
                                        <option value="{{$tacos->tacos_id}}">{{$tacos->tacos_name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>

                        <label class="col-sm-4 col-lg-4 col-form-label">Drink</label>
                        <div class="col-sm-8 col-lg-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-clipboard"></i></label>
                                    </span>
                                    <select name="drink_id" class="form-control" required>
                                        <option value="">--Choose Drink--</option>
                                        @foreach ($drinks as $drink )
                                        @if($drink->drink_id == old('drink_id'))
                                        <option value="{{$drink->drink_id}}" selected>{{$tacos->tacos_name}}</option>
                                        @else
                                        <option value="{{$drink->drink_id}}">{{$drink->drink_name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>

                        <label class="col-sm-4 col-lg-4 col-form-label">Menu Price</label>
                        <div class="col-sm-8 col-lg-8">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <label class="input-group-text"><i class="ik ik-file-text"></i></label>
                                </span>
                                <input type="text" name="menu_price" value="{{old('menu_price')}}" class="form-control"
                                    required>
                            </div>
                        </div>

                        <label class="col-sm-4 col-lg-4 col-form-label">Fries</label>
                        <div class="col-sm-8 col-lg-8">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="fries" id="fries" checked>
                                <span class="custom-control-label" style="cursor: pointer;">&nbsp; Remember Me</span>
                            </label>
                        </div>

                        <label class="col-sm-4 col-lg-4 col-form-label">Drink Image</label>
                        <input type="file" name="image" accept="image/*" class="col-sm-8 col-lg-8 " />
                    </div>
                    <button class="btn btn-success" style="float:right;"><i class="ik ik-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection