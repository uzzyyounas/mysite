<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Muhammad Usman Younas | Software Engineer')</title>
    <meta name="description" content="@yield('meta_description', 'Professional Software Engineer specializing in Oracle ERP and Laravel Development')">
    <meta name="keywords" content="@yield('meta_keywords', 'Software Engineer, Oracle ERP, Laravel, PHP, Full Stack Developer')">
    <meta name="author" content="Muhammad Usman Younas">
    <meta name="robots" content="index, follow">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og_title', 'Muhammad Usman Younas - Software Engineer')">
    <meta property="og:description" content="@yield('og_description', 'Professional Software Engineer specializing in Oracle ERP and Laravel Development')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Muhammad Usman Younas')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Software Engineer | Oracle ERP & Laravel Developer')">

    <!-- Mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#00d4ff">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

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

<div id="toast" class="toast" role="alert" aria-live="assertive"></div>

<script src="{{ asset('js/app.js') }}"></script>

@stack('scripts')
</body>
</html>
