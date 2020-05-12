@extends("partials.admin.master") @section("content")

@include("partials.admin.page-header", [ 'page_header_title'=> 'Browse Tacos',
'item'=> 'Tacos',
'item_route' =>'/tacos'
])

@section('extra-css')
<style>
    .no-drinks {
        text-align: center;
        margin: 20px;
    }

</style>
@endsection

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>Tacos</h3>
            </div>
            <div class="card-body p-0 table-border-style">
                @if(count($tacosList) > 0)
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th class="nosort"><a href="{{route('Tacos.create')}}" class="text-green"
                                        style="float:right;"><i class="ik ik-plus-circle text-green"></i>
                                        New</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tacosList as $tacos )
                            <tr>
                                <th scope="row">{{$tacos->tacos_id}}</th>
                                <td>{{$tacos->tacos_name}}</td>
                                <td>${{$tacos->tacos_price}}</td>
                                <td>
                                    <img src="{{asset('assets/img/tacos/'.$tacos->image)}}" alt="{{$tacos->image}}"
                                        class="img-thumbnail" style="width:100px; height:100px;">
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{route('Tacos.read', $tacos->tacos_id)}}"><i
                                                class="ik ik-eye text-blue"></i></a>
                                        <a href="{{route('Tacos.edit', $tacos->tacos_id)}}"><i
                                                class="ik ik-edit-2 text-green"></i></a>
                                        <a href="{{route('Tacos.destroy', $tacos->tacos_id)}}"
                                            onclick="return confirm('Are you sure to delete this item?');"><i
                                                class="ik ik-trash-2 text-red"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $tacosList->links() }}
                </div>
                @else
                <div class="container no-drinks">
                    <h3>(0) items available!</h3>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection