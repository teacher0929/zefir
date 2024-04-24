<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Navbar">
    <div class="container-xl">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">ZEFIR</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse position-relative" id="navbar">
            <ul class="navbar-nav me-auto">
                @foreach($categories as $category)
                    <li class="nav-item dropdown position-static">
                        <a class="nav-link dropdown-toggle"
                           href="{{ route('products.index', ['category' => $category->slug]) }}"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $category->name }}
                        </a>
                        <div class="dropdown-menu w-100 py-0 px-3">
                            @foreach($category->child as $child)
                                <div class="my-3">
                                    <a class="h6 mb-3 link-dark text-decoration-none text-uppercase"
                                       href="{{ route('products.index', ['category' => $child->slug]) }}">
                                        {{ $child->name }}
                                    </a>
                                    <div class="row row-cols-2 row-cols-md-3 row-cols-xl-4 g-0">
                                        @foreach($child->child as $grandchild)
                                            <div class="col">
                                                <a class="link-dark text-decoration-none text-truncate"
                                                   href="{{ route('products.index', ['category' => $grandchild->slug]) }}">
                                                    {{ $grandchild->name }}
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
