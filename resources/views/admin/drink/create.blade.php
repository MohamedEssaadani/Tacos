@extends("partials.admin.master")

@section("content")

@include("partials.admin.page-header",
[
'page_header_title' => 'Add Drink',
'item'=> 'Drinks',
'item_route' =>'/drinks'
])

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>Add Drink</h3>
            </div>
            <div class="card-body">
                <form action="{{route('Drinks.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <label class="col-sm-4 col-lg-4 col-form-label">Drink Name</label>
                        <div class="col-sm-8 col-lg-8">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <label class="input-group-text"><i class="ik ik-file-text"></i></label>
                                </span>
                                <input type="text" name="drink_name" value="{{old('drink_name')}}" class="form-control"
                                    required>
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
                                        @if($type == old('drink_type'))
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
                                <input type="text" name="drink_price" value="{{old('drink_price')}}"
                                    class="form-control" required>
                            </div>
                        </div>

                        <label class="col-sm-4 col-lg-4 col-form-label">Drink Image</label>
                        <input type="file" name="drink_image" accept="image/*" class="col-sm-8 col-lg-8 btn" />
                    </div>
                    <button class="btn btn-success" style="float:right;"><i class="ik ik-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection