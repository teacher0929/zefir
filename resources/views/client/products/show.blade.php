@extends('client.layouts.app')
@section('title')
    Products
@endsection
@section('content')
    <div class="container py-4">
        <div class="row g-4">
            <div class="col-md-4 col-xl-3">
                @if($product->image)

                @else
                    <img src="{{ asset('img/gender-' . $product->gender_id . '.jpg') }}" alt=""
                         class="img-fluid rounded-3">
                @endif
            </div>
            <div class="col">
                <div class="h4">
                    <a href="{{ route('products.index', ['brand' => $product->brand->slug]) }}"
                       class="link-dark text-decoration-none">
                        {{ $product->brand->name }}
                    </a>
                </div>
                <div class="h4">
                    <a href="{{ route('products.index', ['category' => $product->category->slug]) }}"
                       class="link-dark text-decoration-none">
                        {{ $product->category->name }}
                    </a>
                </div>
                <div class="h3">
                    <a href="{{ route('products.show', $product->slug) }}"
                       class="link-secondary text-decoration-none">
                        {{ $product->name }}
                    </a>
                </div>
                @if($product->has_discount)
                    <div class="h4 text-danger">
                        {{ number_format($product->discounted_price, 2, '.', ' ') }} <small>TMT</small>
                        <span class="small text-secondary text-decoration-line-through">
                            {{ number_format($product->selling_price, 2, '.', ' ') }}
                        </span>
                    </div>
                @else
                    <div class="h4 text-primary">
                        {{ number_format($product->discounted_price, 2, '.', ' ') }} <small>TMT</small>
                    </div>
                @endif
                <div>
                    {{ $product->description }}
                </div>

                <div class="row">
                    <div class="col-md-10 col-xl-6">
                        <div class="card my-4">
                            <div class="card-body">
                                <div class="h5">
                                    COLORS
                                </div>
                                <div class="row row-cols-4 g-2">
                                    @foreach($colors->sortBy('colorAttributeValue.name') as $color)
                                        <div class="col position-relative">
                                            <div class="mb-2">
                                                @if($color->image)

                                                @else
                                                    <img src="{{ asset('img/gender-' . $color->gender_id . '.jpg') }}" alt="" class="img-fluid border {{ $product->id == $color->id ? 'border-danger':'' }} rounded-3">
                                                @endif
                                            </div>
                                            <div class="h6 mb-0 text-center">
                                                <a href="{{ route('products.show', $color->slug) }}"
                                                   class="link-dark text-decoration-none stretched-link">
                                                    {{ $color->colorAttributeValue->name }}
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="card my-4">
                            <div class="card-body">
                                <div class="h5">
                                    SIZES
                                </div>
                                <div class="row row-cols-4 g-2">
                                    @foreach($sizes->sortBy('sizeAttributeValue.sort_order') as $size)
                                        <div class="col">
                                            <div class="h6 mb-0 text-center {{ $size->stock > 0 ? '':'text-bg-danger' }} border rounded-3 p-1 p-sm-2">
                                                {{ $size->sizeAttributeValue->name }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-secondary bg-opacity-10">
        <div class="container-lg py-4">
            <div class="h4 text-uppercase mb-4">
                <a href="{{ route('products.index', ['category' => $product->category->slug]) }}"
                   class="link-dark text-decoration-none">
                    SIMILAR PRODUCTS <i class="bi-chevron-right"></i>
                </a>
            </div>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 g-2 g-md-3">
                @foreach($similar as $product)
                    <div class="col">
                        @include('client.app.product')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
