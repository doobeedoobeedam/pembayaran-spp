<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

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
    <link href="css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    @if (session()->has('status'))
    <div class="alert alert-success alert-dismissible fade show position-absolute mt-3 top-0 end-0  me-3" role="alert"
        style="z-index: 5;">
        {{ session('status') }}
        {{-- berhasil --}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <main class="form-signin bg-white py-5 rounded shadow">
        <form action="/login" method="POST">
            @csrf
            <img src="img/SMK TARUNA BHAKTI.jpg" alt="" width="90">
            <h1 class="h3 mb-3 fw-normal">Form login</h1>
            <div class="mb-2">
                <input type="text" class="form-control rounded-pill @error('username') is-invalid @enderror" name="username"
                    placeholder="Username" value="{{ old('username') }}" required>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-2">
                <input type="password" class="form-control rounded-pill @error('password') is-invalid @enderror" name="password"
                    placeholder="password" required value="{{ old('password') }}">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="w-100 btn btn-primary mb-2 rounded-pill" type="submit">Login</button>
        </form>
        <small>Belum pernah register? <a href="/register" class="text-primary">Register sekarang!</a></small>
    </main>
</body>
</html>