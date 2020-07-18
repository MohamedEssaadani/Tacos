@extends('partials.client-side.master')
@section('content')
@include('partials.client-side.header-2')
<section style="background:#f8f9fa;">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row mb-4">
                    <div class="col-md-2">
                        <label>Full Name</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control " name="firstName">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-2">
                        <label>Address</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control " name="firstName">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-2">
                        <label>Phone </label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control " name="firstName">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                Here Items
            </div>
        </div>
    </div>
</section>
@endsection