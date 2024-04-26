<div class="position-relative bg-white h-100 rounded-3 p-1 p-sm-2 shadow-sm">
    <div class="mb-2">
        @if($product->image)

        @else
            <img src="{{ asset('img/gender-' . $product->gender_id . '.jpg') }}" alt="" class="img-fluid rounded-3">
        @endif
    </div>
    <div class="h6 mb-1">
        {{ $product->brand->name }}
    </div>
    <div class="h6 mb-1">
        {{ $product->category->name }}
    </div>
    <div>
        <a href="{{ route('products.show', $product->slug) }}"
           class="link-secondary text-decoration-none stretched-link">
            {{ $product->name }}
        </a>
    </div>
    @if($product->has_discount)
        <div class="fw-semibold text-danger">
            {{ number_format($product->discounted_price, 2, '.', ' ') }} <small>TMT</small>
            <span class="small text-secondary text-decoration-line-through">
                {{ number_format($product->selling_price, 2, '.', ' ') }}
            </span>
        </div>
    @else
        <div class="fw-semibold text-primary">
            {{ number_format($product->discounted_price, 2, '.', ' ') }} <small>TMT</small>
        </div>
    @endif
</div>
