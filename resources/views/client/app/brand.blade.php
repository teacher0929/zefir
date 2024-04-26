<a href="{{ route('products.index', ['brand' => $brand->slug]) }}"
   class="link-dark text-decoration-none">
    <div class="w-50 mx-auto mb-2">
        @if($brand->image)

        @else
            <img src="{{ asset('img/brand.jpg') }}" alt="" class="img-fluid rounded-circle">
        @endif
    </div>
    <div class="text-center">
        {{ $brand->name }} <i class="bi-chevron-right"></i>
    </div>
</a>
