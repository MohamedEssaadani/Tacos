@extends("partials.admin.master")

@section("content")

@include("partials.admin.page-header",
[
'page_header_title' => 'Edit Drink',
'item'=> 'Drinks',
'item_route' =>'/drinks'
])

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>Edit Drink</h3>
            </div>
            <div class="card-body">
                <form action="{{route('Drinks.update', $drink->drink_id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <label class="col-sm-4 col-lg-4 col-form-label">Drink Id</label>
                        <div class="col-sm-8 col-lg-8">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <label class="input-group-text"><i class="ik ik-slack"></i></label>
                                </span>
                                <input type="text" name="drink_id" value="{{$drink->drink_id}}" class="form-control"
                                    readonly>
                            </div>
                        </div>

                        <label class="col-sm-4 col-lg-4 col-form-label">Drink Name</label>
                        <div class="col-sm-8 col-lg-8">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <label class="input-group-text"><i class="ik ik-file-text"></i></label>
                                </span>
                                <input type="text" name="drink_name" value="{{$drink->drink_name}}"
                                    class="form-control">
                            </div>
                        </div>

                        <label class="col-sm-4 col-lg-4 col-form-label">Drink Type</label>
                        <div class="col-sm-8 col-lg-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <label class="input-group-text"><i class="ik ik-clipboard"></i></label>
                                    </span>
                                    <select name="drink_type" class="form-control" required>
                                        <option value="">--SELECT--</option>
                                        @foreach ($drink_types as $type )
                                        @if($type == $drink->drink_type)
                                        <option value="{{$type}}" selected>{{$type}}</option>
                                        @else
                                        <option value="{{$type}}">{{$type}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>

                        <label class="col-sm-4 col-lg-4 col-form-label">Drink Price</label>
                        <div class="col-sm-8 col-lg-8">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <label class="input-group-text"><i class="ik ik-dollar-sign"></i></label>
                                </span>
                                <input type="text" name="drink_price" value="{{$drink->drink_price}}"
                                    class="form-control">
                            </div>
                        </div>

                        <label class="col-sm-4 col-lg-4 col-form-label">Drink Image</label>
                        <div class="col-sm-8 col-lg-8 ">
                            <input type="file" name="drink_image" accept="image/*" onchange="onImageSelected(event)" />
                            <br>
                            <img src="{{asset('assets/img/drinks/'.$drink->drink_image)}}" id="img"
                                alt="{{$drink->drink_image}}" style="height:200px; width:200px;">
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