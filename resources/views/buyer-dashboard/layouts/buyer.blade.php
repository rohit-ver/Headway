<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Buyer Dashboard | HeadwayStrata')
    </title>


    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">


    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    {{-- Fonts --}}
    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
          rel="stylesheet">


    {{-- Buyer Dashboard CSS --}}
    <link rel="stylesheet"
          href="{{ asset('css/buyer-dashboard.css') }}">


    @stack('styles')

</head>


<body class="buyer-dashboard-body">


<div class="buyer-dashboard-wrapper">


    {{-- SIDEBAR --}}
    @include('buyer-dashboard.layouts.sidebar')


    {{-- MAIN CONTENT --}}
    <main class="buyer-main-content">


        {{-- HEADER --}}
        @include('buyer-dashboard.layouts.header')


        {{-- CONTENT --}}
        <div class="buyer-content-area">

            @yield('content')

        </div>


        {{-- FOOTER --}}
        @include('buyer-dashboard.layouts.footer')


    </main>

</div>


{{-- Mobile Overlay --}}
<div class="buyer-sidebar-overlay"
     id="buyerSidebarOverlay"
     onclick="closeBuyerSidebar()">
</div>


{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


{{-- Buyer JS --}}
<script src="{{ asset('js/buyer-dashboard.js') }}">
</script>


@stack('scripts')

</body>

</html>