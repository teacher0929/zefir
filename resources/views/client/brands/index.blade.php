@extends('client.layouts.app')
@section('title')
    Products
@endsection
@section('content')
    <div class="container-lg py-4">
        <div class="h4 text-uppercase mb-4">
            BRANDS
        </div>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 g-3 g-md-4">
            @foreach($brands as $brand)
                <div class="col">
                    @include('client.app.brand')
                </div>
            @endforeach
        </div>
    </div>
@endsection
