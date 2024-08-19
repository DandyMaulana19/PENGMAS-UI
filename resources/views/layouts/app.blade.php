<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

@include('components.navbar')

<body class="bg-primary">

    <main class="">
        {{-- <img src="{{ asset('assets/Ellipse 1.svg') }}" class="absolute bottom-0  left-96" alt=""> --}}
        {{-- <img src="{{ asset('assets/Ellipse 2.svg') }}" class="absolute top-0  right-96" alt=""> --}}
        @yield('content')
    </main>

    <script src="./node_modules/preline/dist/preline.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

</body>

</html>
