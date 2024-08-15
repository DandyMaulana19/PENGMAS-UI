<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>


<body class="bg-primary">

    <main class="">
        {{-- <img src="{{ asset('assets/Ellipse 1.svg') }}" class="absolute bottom-0  left-96" alt=""> --}}
        {{-- <img src="{{ asset('assets/Ellipse 2.svg') }}" class="absolute top-0  right-96" alt=""> --}}
        @yield('content')
    </main>

    <script src="./node_modules/preline/dist/preline.js"></script>
</body>

</html>
