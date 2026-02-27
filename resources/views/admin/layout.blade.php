<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="font-sans antialiased h-full overflow-hidden">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden bg-gray-100">
        <!-- Sidebar -->
        <aside 
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-white transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-0 lg:flex-shrink-0"
        >
            @include('admin.partials.sidebar')
        </aside>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            <!-- Topbar -->
            <header class="relative z-10 flex flex-shrink-0 h-16 bg-white shadow">
                <button 
                    @click="sidebarOpen = !sidebarOpen"
                    class="px-4 text-gray-500 border-r border-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 lg:hidden"
                >
                    <i class="bi bi-list text-2xl"></i>
                </button>
                
                <div class="flex justify-between flex-1 px-4">
                    <div class="flex flex-1">
                        <div class="flex items-center text-sm font-medium text-gray-500">
                            CMS Dashboard
                        </div>
                    </div>
                    <div class="flex items-center ml-4 md:ml-6">
                        <a href="{{ route('home') }}" target="_blank" class="p-1 text-gray-400 rounded-full hover:text-gray-500 focus:outline-none">
                            <i class="bi bi-box-arrow-up-right mr-1"></i> Preview Site
                        </a>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="relative flex-1 overflow-y-auto focus:outline-none">
                <div class="py-6">
                    <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>

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
                html: '<ul class="text-left">' + 
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
    @stack('scripts')
</body>
</html>
