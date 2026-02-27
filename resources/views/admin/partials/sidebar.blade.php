<div class="flex flex-col h-full">
    <div class="flex items-center flex-shrink-0 h-16 px-4 bg-slate-800">
        <div class="flex items-center justify-center w-8 h-8 mr-2 bg-blue-600 rounded shadow-md">
            <span class="font-bold text-white">M</span>
        </div>
        <span class="text-xl font-bold tracking-tight">Mobility <span class="text-blue-500">Admin</span></span>
    </div>
    
    <div class="flex flex-col flex-1 overflow-y-auto">
        <nav class="flex-1 px-2 py-4 space-y-1">
            <a href="{{ route('admin.dashboard') }}" 
                class="flex items-center px-3 py-2 text-sm font-medium rounded-md group {{ Route::is('admin.dashboard') ? 'bg-slate-800 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <i class="mr-3 text-lg bi bi-speedometer2 {{ Route::is('admin.dashboard') ? 'text-blue-400' : 'text-slate-400 group-hover:text-slate-300' }}"></i>
                Dashboard
            </a>

            <div class="pt-4 pb-1">
                <p class="px-3 text-xs font-semibold tracking-wider uppercase text-slate-500">Configuration</p>
            </div>

            <a href="{{ route('admin.company.edit') }}" 
                class="flex items-center px-3 py-2 text-sm font-medium rounded-md group {{ Route::is('admin.company.*') ? 'bg-slate-800 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <i class="mr-3 text-lg bi bi-building {{ Route::is('admin.company.*') ? 'text-blue-400' : 'text-slate-400 group-hover:text-slate-300' }}"></i>
                Company Profile
            </a>

            <a href="{{ route('admin.contact.edit') }}" 
                class="flex items-center px-3 py-2 text-sm font-medium rounded-md group {{ Route::is('admin.contact.*') ? 'bg-slate-800 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <i class="mr-3 text-lg bi bi-envelope {{ Route::is('admin.contact.*') ? 'text-blue-400' : 'text-slate-400 group-hover:text-slate-300' }}"></i>
                Contact Settings
            </a>

            <div class="pt-4 pb-1">
                <p class="px-3 text-xs font-semibold tracking-wider uppercase text-slate-500">CMS Content</p>
            </div>

            <a href="{{ route('admin.services.index') }}" 
                class="flex items-center px-3 py-2 text-sm font-medium rounded-md group {{ Route::is('admin.services.*') ? 'bg-slate-800 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <i class="mr-3 text-lg bi bi-briefcase {{ Route::is('admin.services.*') ? 'text-blue-400' : 'text-slate-400 group-hover:text-slate-300' }}"></i>
                Services
            </a>

            <a href="{{ route('admin.projects.index') }}" 
                class="flex items-center px-3 py-2 text-sm font-medium rounded-md group {{ Route::is('admin.projects.*') ? 'bg-slate-800 text-white' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                <i class="mr-3 text-lg bi bi-collection {{ Route::is('admin.projects.*') ? 'text-blue-400' : 'text-slate-400 group-hover:text-slate-300' }}"></i>
                Projects
            </a>
        </nav>
    </div>

    <div class="flex-shrink-0 p-4 border-t border-slate-800">
        <div class="group block w-full flex-shrink-0">
            <div class="flex items-center">
                <div class="ml-3">
                    <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                    <div class="flex mt-1 space-x-2">
                        <a href="{{ route('profile.edit') }}" class="text-xs font-medium text-slate-400 hover:text-white">Profile</a>
                        <span class="text-slate-600">|</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-xs font-medium text-slate-400 hover:text-red-400">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
