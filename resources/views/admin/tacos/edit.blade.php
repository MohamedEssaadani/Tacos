@extends("partials.admin.master")

@section("content")

@include("partials.admin.page-header",
[
'page_header_title' => 'Edit Tacos',
'item'=> 'Tacos',
'item_route' =>'/tacos'
])

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>Edit Tacos</h3>
            </div>
            <div class="card-body">
                <form action="{{route('Tacos.update', $tacos->tacos_id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <label class="col-sm-4 col-lg-4 col-form-label">Tacos Id</label>
                        <div class="col-sm-8 col-lg-8">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <label class="input-group-text"><i class="ik ik-slack"></i></label>
                                </span>
                                <input type="text" name="tacos_name" value="{{$tacos->tacos_id}}" class="form-control"
                                    readonly>
                            </div>
                        </div>

                        <label class="col-sm-4 col-lg-4 col-form-label">Tacos Name</label>
                        <div class="col-sm-8 col-lg-8">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <label class="input-group-text"><i class="ik ik-file-text"></i></label>
                                </span>
                                <input type="text" name="tacos_name" value="{{$tacos->tacos_name}}"
                                    class="form-control">
                            </div>
                        </div>

                        <label class="col-sm-4 col-lg-4 col-form-label">Tacos Price</label>
                        <div class="col-sm-8 col-lg-8">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <label class="input-group-text"><i class="ik ik-dollar-sign"></i></label>
                                </span>
                                <input type="text" name="tacos_price" value="{{$tacos->tacos_price}}"
                                    class="form-control">
                            </div>
                        </div>

                        <label class="col-sm-4 col-lg-4 col-form-label">Tacos Image</label>
                        <div class="col-sm-8 col-lg-8 ">
                            <input type="file" name="tacos_image" accept="image/*" /> <br>
                            <img src="{{asset('assets/img/tacos/'.$tacos->image)}}" alt="{{$tacos->image}}"
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