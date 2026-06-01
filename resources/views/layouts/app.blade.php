<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Muhammad Usman Younas - Software Engineer, Oracle ERP & Full Stack Laravel Developer based in Faisalabad, Pakistan.">
    <meta name="keywords" content="Usman Younas, Oracle ERP, Laravel Developer, PHP, APEX, Software Engineer Faisalabad">
    <meta property="og:title" content="Muhammad Usman Younas – Software Engineer">
    <meta property="og:description" content="Oracle ERP & Full Stack Developer with 4+ years of enterprise experience.">
    <meta property="og:type" content="website">
    <title>@yield('title', 'Muhammad Usman Younas | Software Engineer')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @stack('head')
</head>
<body>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.whatsapp')

    <!-- Toast Notification -->
    <div id="toast" class="toast" role="alert" aria-live="assertive"></div>

    <!-- Main JS -->
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')
</body>
</html>
