<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Headway')
    </title>

    <meta name="description"
        content="@yield('meta_description', 'Premium quality Makhana sourced from trusted farms.')">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/headway-logo.png') }}">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth-modal.css') }}">

    @stack('styles')
</head>

<body>

    @include('layouts.header')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('js/animation.js') }}"></script>
    <script src="{{ asset('js/auth-modal.js') }}"></script>

    @stack('scripts')

</body>

</html>