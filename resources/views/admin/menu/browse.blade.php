@extends("partials.admin.master")
@section("content")

@include("partials.admin.page-header",
[ 'page_header_title'=> 'Browse Menus',
'item'=> 'Menus',
'item_route' =>'/menus'
])

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-block">
                <h3>Menus</h3>
            </div>
            <div class="card-body p-0 table-border-style">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Tacos</th>
                                <th>Drink</th>
                                <th>Price</th>
                                <th>Fries</th>
                                <th>Image</th>
                                <th class="nosort"><a href="{{route('Menus.create')}}" class="text-green"
                                        style="float:right;"><i class="ik ik-plus-circle text-green"></i>
                                        New</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $menu )
                            <tr>
                                <th scope="row">{{$menu->menu_id}}</th>
                                <td>{{$menu->menu_name}}</td>
                                <td>{{$tacosItems[$menu->tacos_id]->tacos_name}}</td>
                                <td>{{$drinks[$menu->drink_id]->drink_name}}</td>
                                <td>${{$menu->menu_price}}</td>
                                <td>{{$menu->with_frite == true ? 'Yes' : 'No'}}</td>
                                <td>
                                    <img src="{{asset('assets/img/menus/'.$menu->image)}}" alt="{{$menu->image}}"
                                        class="img-thumbnail" style="width:100px; height:100px;">
                                </td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{route('Menus.show', $menu->menu_id)}}"><i
                                                class="ik ik-eye text-blue"></i></a>
                                        <a href="{{route('Menus.edit', $menu->menu_id)}}"><i
                                                class="ik ik-edit-2 text-green"></i></a>
                                        <a href="{{route('Menus.destroy', $menu->menu_id)}}"
                                            onclick="return confirm('Are you sure to delete this item?');"><i
                                                class="ik ik-trash-2 text-red"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $menus->links() }}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection