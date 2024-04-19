@extends('client.layouts.app')
@section('title')
    Home
@endsection
@section('content')
    @foreach($objs as $obj)
        <div class="{{ $loop->odd ? 'bg-secondary bg-opacity-10':'' }}">
            <div class="container-lg py-4">
                <div class="h5 mb-3">
                    {{ $obj['category']['name'] }}
                </div>
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 g-2 g-md-3">
                    @foreach($obj['products'] as $product)
                        <div class="col">
                            <div class="h6">
                                <div>
                                    <a href="{{ route('products.index', ['brand' => $product->brand->slug]) }}"
                                       class="link-dark text-decoration-none">
                                        {{ $product->brand->name }}
                                    </a>
                                    <a href="{{ route('products.index', ['category' => $product->category->slug]) }}"
                                       class="link-dark text-decoration-none">
                                        {{ $product->category->name }}
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('products.show', $product->slug) }}"
                                       class="link-dark text-decoration-none">
                                        {{ $product->name }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
@endsection
