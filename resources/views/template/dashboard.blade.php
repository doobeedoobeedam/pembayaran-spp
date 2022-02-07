<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPP</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="{{  asset('css/dashboard.css') }}" rel="stylesheet">
</head>

<body>

    @if (session()->has('status'))
    <div class="alert alert-success alert-dismissible fade show position-absolute top-0 end-0  me-3" role="alert"
        style="z-index: 5; margin-top: 53px;">
        {{ session('status') }}
        {{-- berhasil --}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/dashboard">Starbhak</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> --}}
        {{-- <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#">Sign out</a>
            </div>
        </div> --}}
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard') ? 'active bg-white border-end border-4 border-primary' : '' }}" href="/dashboard">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        {{-- @if(Auth::user()->role == 'petugas') --}}
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('pembayaran') ? 'active bg-white border-end border-4 border-primary' : '' }}" href="/pembayaran">
                                    <span data-feather="file"></span>
                                    Transaksi Pembayaran
                                </a>
                            </li>
                        {{-- @endif --}}
                    </ul>

                    @if(Auth::user()->role == 'admin')
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Administrator</span>
                        </h6>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('spp') ? 'active bg-white border-end border-4 border-primary' : '' }}" href="/spp">
                                    <span data-feather="folder"></span>
                                    SPP
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('kelas') ? 'active bg-white border-end border-4 border-primary' : '' }}" href="/kelas">
                                    <span data-feather="folder"></span>
                                    Kelas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('siswa') ? 'active bg-white border-end border-4 border-primary' : '' }}" href="/siswa">
                                    <span data-feather="folder"></span>
                                    Siswa
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" {{ Request::is('user') ? 'active bg-white border-end border-4 border-primary' : '' }} href="/user">
                                    <span data-feather="users"></span>
                                    User
                                </a>
                            </li>
                        </ul>
                    @endif
                    <hr>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <form action="/logout" method="post">
                                @csrf
                                <button class="border-0 bg-transparent nav-link" type="submit" onclick="return confirm('Yakin ingin logout?')">
                                    <span data-feather="log-out"></span>
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('main')
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>