<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Mobility Unlimited</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
      body { min-height: 100vh; background-color: #f8f9fa; }
      .admin-wrapper { display: flex; width: 100%; align-items: stretch; }
      .sidebar { min-width: 280px; max-width: 280px; min-height: 100vh; transition: all 0.3s; z-index: 1000; }
      .sidebar.active { margin-left: -280px; }
      .content { width: 100%; padding: 20px; transition: all 0.3s; }
      @media (max-width: 768px) {
        .sidebar { margin-left: -280px; }
        .sidebar.active { margin-left: 0; }
      }
      .nav-link.active { background-color: #0d6efd !important; }
      .nav-link:hover { background-color: rgba(255,255,255,0.1); }
    </style>
  </head>
  <body>
    <div class="admin-wrapper">
      <div id="sidebar" class="sidebar">
        @include('admin.partials.sidebar')
      </div>
      
      <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4 rounded">
          <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-outline-primary me-3">
              <i class="bi bi-list"></i>
            </button>
            <span class="navbar-brand mb-0 h1">CMS Dashboard</span>
            <div class="ms-auto d-flex align-items-center">
              <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary me-2" target="_blank">
                <i class="bi bi-box-arrow-up-right me-1"></i> Preview Site
              </a>
            </div>
          </div>
        </nav>

        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      // SweetAlert2 notification handler
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      });

      @if(session('success'))
        Toast.fire({
          icon: 'success',
          title: {!! json_encode(session('success')) !!}
        });
      @endif

      @if(session('error'))
        Toast.fire({
          icon: 'error',
          title: {!! json_encode(session('error')) !!}
        });
      @endif

      @if(session('info'))
        Toast.fire({
          icon: 'info',
          title: {!! json_encode(session('info')) !!}
        });
      @endif

      @if(session('warning'))
        Toast.fire({
          icon: 'warning',
          title: {!! json_encode(session('warning')) !!}
        });
      @endif

      @if($errors->any())
        Swal.fire({
          icon: 'error',
          title: 'Validation Error',
          html: '<ul class="text-start">' + 
                @foreach($errors->all() as $error)
                '<li>{{ $error }}</li>' +
                @endforeach
                '</ul>'
        });
      @endif

      // Confirmation for delete actions
      document.addEventListener('click', function(e) {
        if (e.target && (e.target.classList.contains('delete-confirm') || e.target.closest('.delete-confirm'))) {
          e.preventDefault();
          const form = e.target.closest('form');
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              form.submit();
            }
          });
        }
      });
    </script>
    <script>
      document.getElementById('sidebarCollapse').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('active');
      });
    </script>
    @stack('scripts')
  </body>
</html>
