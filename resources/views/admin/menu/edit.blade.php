@extends("partials.admin.master")

@section("content")

@include("partials.admin.page-header",
[
'page_header_title' => 'Edit Menu',
'item'=> 'Menus',
'item_route' =>'/menus'
])

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>Edit Menu</h3>
            </div>
            <div class="card-body">
                <form action="{{route('Menus.update')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @method('patch')
                    <div class="row">
                        <input type="hidden" name="menu_id" value="{{$menu->menu_id}}">
                        <label class="col-sm-4 col-lg-4 col-form-label">Menu Name</label>
                        <div class="col-sm-8 col-lg-8">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <label class="input-group-text"><i class="ik ik-file-text"></i></label>
                                </span>
                                <input type="text" name="menu_name" value="{{$menu->menu_name}}" class="form-control"
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
                                        @if($tacos->tacos_id == $menu_tacos->tacos_id)
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
                                        @if($drink->drink_id == $menu_drink->drink_id)
                                        <option value="{{$drink->drink_id}}" selected>{{$drink->drink_name}}</option>
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
                                <input type="text" name="menu_price" value="{{$menu->menu_price}}" class="form-control"
                                    required>
                            </div>
                        </div>

                        <label class="col-sm-4 col-lg-4 col-form-label">Fries</label>
                        <div class="col-sm-8 col-lg-8">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="fries" id="fries"
                                    {{ ($menu->with_frite ? "checked" : !"checked") }}>
                                <span class="custom-control-label" style="cursor: pointer;">&nbsp; Remember Me</span>
                            </label>
                        </div>

                        <label class="col-sm-4 col-lg-4 col-form-label">Menu Image</label>
                        <div class="col-sm-8 col-lg-8 ">
                            <input type="file" name="menu_image" accept="image/*" onchange="onImageSelected(event)" />
                            <br>
                            <img src="{{asset('assets/img/menus/'.$menu->image)}}" id="img" alt="{{$menu->image}}"
                                style="height:200px; width:200px;">
                        </div>
                    </div>
                    <button class="btn btn-success" style="float:right;"><i class="ik ik-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra-js')
<script>
    function onImageSelected(event) {
        var selectedImage = event.target.files[0];
        var reader = new FileReader();

        var img = document.getElementById("img");
        img.title = selectedImage.name;

        reader.onload = function(event) {
        img.src = event.target.result;
        };

        reader.readAsDataURL(selectedImage);
        }
</script>
@endsection