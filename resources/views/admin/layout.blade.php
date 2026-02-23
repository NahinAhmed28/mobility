<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Mobility Unlimited</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin</a>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">View Site</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.company.edit') }}">Company</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin.contact.edit') }}">Contact</a></li>
            <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-link nav-link">Logout</button></form>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container my-4">
      @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
      @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
