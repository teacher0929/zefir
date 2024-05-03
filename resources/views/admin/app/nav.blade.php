<nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Navbar">
    <div class="container-xl">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">ADMIN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse position-relative" id="navbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link link-light" href="{{ route('admin.banners.index') }}"><i class="bi-image"></i> Banners</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" href="{{ route('admin.products.index') }}"><i class="bi-box"></i> Products</a>
                </li>
                @if(auth()->user()['is_admin'])
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            Others
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('admin.genders.index') }}">Genders</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.categories.index') }}">Categories</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.brands.index') }}">Brands</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.attributes.index') }}">Attributes</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.attributeValues.index') }}">Attribute values</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.variants.index') }}">Variants</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.users.index') }}">Users</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link link-warning" href="{{ route('home') }}" target="_blank">
                        <i class="bi-house"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                        <i class="bi-box-arrow-up-right"></i> {{ auth()->user()['name'] }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}" id="logout">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
