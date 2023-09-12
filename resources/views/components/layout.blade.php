<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dictionary</title>   <!-- add dyniamic -->
    <meta name="description" content="Dictionary">    <!-- add dyniamic -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <link rel="stylesheet" href="{{url('/css/app.css')}}" >


    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="/">Listing <span class="sr-only">(current)</span></a>
            </li>

        </ul>
        <div class="d-flex">
            @auth
            <span class="nav-item to-end">
                <form method="POST" action="/logout" class="logout-form">
                    @csrf
                <button class="nav-link" href="/logout">Logout</button>
                </form>
            </span>
            @else
            <span class="nav-item to-end">
                <a class="nav-link" href="/login">Login</a>
            </span>
            <span class="nav-item to-end">
                <a class="nav-link" href="/register">Register</a>
            </span>
            @endauth
        </div>

        </div>
      </nav>
<main>

    @if(session()->has('message'))
    {{-- (x-) alpine.js --}}
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 10000)" x-show="show" class="alert alert-info -translate-x-1/2 fixed top-0 left-1/2 transform bg-laravel text-red px-48 py-3">
    <p class="text-center">
        {{session('message') }}
    </p>
</div>
@endif
{{$slot }}
</main>
<footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel h-24 mt-24 opacity-90 md:justify-center"
    >
    <p class="ml-2">Copyright &copy; 2023, All Rights reserved</p>


    </footer>
</body>
</html>
