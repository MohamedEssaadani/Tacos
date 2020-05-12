@extends("partials.admin.master")

@section("content")

@include("partials.admin.page-header",
[
'page_header_title' => 'Add Tacos',
'item'=> 'Tacos',
'item_route' =>'/tacos'
])

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>Add Tacos</h3>
            </div>
            <div class="card-body">
                <form action="{{route('Tacos.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <label class="col-sm-4 col-lg-4 col-form-label">Tacos Name</label>
                        <div class="col-sm-8 col-lg-8">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <label class="input-group-text"><i class="ik ik-file-text"></i></label>
                                </span>
                                <input type="text" name="tacos_name" value="{{old('tacos_name')}}" class="form-control"
                                    required>
                            </div>
                        </div>

                        <label class="col-sm-4 col-lg-4 col-form-label">Tacos Price</label>
                        <div class="col-sm-8 col-lg-8">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <label class="input-group-text"><i class="ik ik-dollar-sign"></i></label>
                                </span>
                                <input type="text" name="tacos_price" value="{{old('tacos_price')}}"
                                    class="form-control" required>
                            </div>
                        </div>

                        <label class="col-sm-4 col-lg-4 col-form-label">Tacos Image</label>
                        <input type="file" name="tacos_image" accept="image/*" class="col-sm-8 col-lg-8 btn" />
                    </div>
                    <button class="btn btn-success" style="float:right;"><i class="ik ik-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection