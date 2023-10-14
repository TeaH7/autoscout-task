<!-- Header -->
<header class="container-fluid px-0">

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">AutoScout

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">

                    @if (!auth()->user() || (auth()->user() && auth()->user()->role_id === 2))
                        <li class="nav-item mx-3 ">
                            <a class="nav-link text-uppercase fs-6 fw-semibold" aria-current="page"
                                href="{{ route('home') }}">Homepage</a>
                        </li>
                    @else
                        <li class="nav-item mx-3 ">
                            <a class="nav-link text-uppercase fs-6 fw-semibold" aria-current="page"
                                href="{{ route('admin') }}">Dashboard</a>
                        </li>
                    @endif


                    @if (auth()->user() && auth()->user()->role_id === 1)
                        <li class="nav-item mx-3 ">
                            <a class="nav-link text-uppercase fs-6 fw-semibold" aria-current="page"
                                href="{{ route('orders.index') }}">Orders</a>
                        </li>

                        <li class="nav-item dropdown mx-3">
                            <a class="nav-link dropdown-toggle text-uppercase fs-6 fw-semibold" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Cars
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('cars.index') }}">All Cars</a></li>
                                <li><a class="dropdown-item" href="{{ route('cars.create') }}">Create Car</a></li>

                            </ul>
                        </li>
                        <li class="nav-item dropdown mx-3">
                            <a class="nav-link dropdown-toggle text-uppercase fs-6 fw-semibold" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tags
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('tags.index') }}">All Tags</a></li>
                                <li><a class="dropdown-item" href="{{ route('tags.create') }}">Create Tag</a></li>

                            </ul>
                        </li>
                    @endif

                    @if (!auth()->user())
                        <li class="nav-item mx-3 ">
                            <a class="nav-link text-uppercase fs-6 fw-semibold" aria-current="page"
                                href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item mx-3 ">
                            <a class="nav-link text-uppercase fs-6 fw-semibold" aria-current="page"
                                href="{{ route('register') }}">Register</a>
                        </li>
                    @endif


                    @auth
                        <li>
                            <a class="nav-link text-uppercase fs-6 fw-semibold" href=""
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endauth


                    <li class="nav-item mx-3">
                        <a class="nav-link text-uppercase fs-6 fw-semibold" aria-current="page"
                            href="{{ route('cart') }}"><i class="bi bi-cart fs-3"></i></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- Header End -->
