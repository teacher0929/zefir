<div class="container-lg py-4">
    <div class="h4 text-uppercase mb-4">
        <a href="{{ route('brands.index') }}" class="link-dark text-decoration-none">
            BRANDS <i class="bi-chevron-right"></i>
        </a>
    </div>
    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 g-2 g-md-3">
        @foreach($brands as $brand)
            <div class="col">
                <a href="{{ route('products.index', ['brand' => $brand->slug]) }}"
                   class="link-dark text-decoration-none">
                    {{ $brand->name }} <i class="bi-chevron-right"></i>
                </a>
            </div>
        @endforeach
    </div>
</div>
