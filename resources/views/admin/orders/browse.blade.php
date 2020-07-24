@extends("partials.admin.master")
@section("content")

@include("partials.admin.page-header",
[ 'page_header_title'=> 'Browse Orders',
'item'=> 'Orders',
'item_route' =>''
])

<div class="row">
    <div class="col-md-12">
      <orders-list></orders-list>
    </div>
</div>

@endsection

