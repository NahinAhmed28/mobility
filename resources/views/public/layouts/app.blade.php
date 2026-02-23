<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $metaTitle ?? ($company->name ?? 'Mobility Unlimited') }}</title>
    <meta name="description" content="{{ $metaDescription ?? ($company->tagline ?? '') }}">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUarbnLvQfdLrArUFm6M1fwxF/lJkl8NVVfDzLk2+5SSdc4Dwja" crossorigin="anonymous">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWbSxccPQtF3EpF3fnJHog6LaEVc/ETea2IG59nSrn006jJ82" crossorigin="anonymous"></script>
    <!-- Public Panel Custom JS (No Dependencies) -->
    <script src="{{ asset('js/public.js') }}"></script>
  </body>
</html>
