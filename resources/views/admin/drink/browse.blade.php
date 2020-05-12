@extends("partials.admin.master")
@section("content")

@include("partials.admin.page-header",
[ 'page_header_title'=> 'Browse Drinks',
'item'=> 'Drinks',
'item_route' =>'/drinks'
])

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>Drinks</h3>
            </div>
            <div class="card-body p-0 table-border-style">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th class="nosort"><a href="{{route('Drinks.create')}}" class="text-green"
                                        style="float:right;"><i class="ik ik-plus-circle text-green"></i>
                                        New</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($drinks as $drink )
                            <tr>
                                <th scope="row">{{$drink->drink_id}}</th>
                                <td>{{$drink->drink_name}}</td>
                                <td>{{$drink->drink_type}}</td>
                                <td>${{$drink->drink_price}}</td>
                                <td>
                                    <img src="{{asset('assets/img/drinks/'.$drink->drink_image)}}"
                                        alt="{{$drink->drink_image}}" class="img-thumbnail"
                                        style="width:100px; height:100px;">
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{route('Drinks.show', $drink->drink_id)}}"><i
                                                class="ik ik-eye text-blue"></i></a>
                                        <a href="{{route('Drinks.edit', $drink->drink_id)}}"><i
                                                class="ik ik-edit-2 text-green"></i></a>
                                        <a href="{{route('Drinks.destroy', $drink->drink_id)}}"
                                            onclick="return confirm('Are you sure to delete this item?');"><i
                                                class="ik ik-trash-2 text-red"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $drinks->links() }}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection