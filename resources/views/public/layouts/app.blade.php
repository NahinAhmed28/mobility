<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $metaTitle ?? ($company->name ?? 'Mobility Unlimited') }}</title>
    <meta name="description" content="{{ $metaDescription ?? ($company->tagline ?? '') }}">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Custom Public CSS (No Tailwind, No Vite) -->
    <link rel="stylesheet" href="{{ asset('css/public.css') }}">
    <!-- Content Styles -->
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">
  </head>
  <body>
    @include('public.partials.header')

    <main>
      @yield('content')
    </main>

    @include('public.partials.footer')

    <!-- Bootstrap 5 JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Public Panel Custom JS (No Dependencies) -->
    <script src="{{ asset('js/public.js') }}"></script>
  </body>
</html>
