<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ServicesController;
use App\Http\Controllers\Public\ProjectsController;
use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Public\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('/projects/{project:slug}', [ProjectsController::class, 'show'])->name('projects.show');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        
        // Company & Contact
        Route::get('/company', [\App\Http\Controllers\Admin\CompanyProfileController::class, 'edit'])->name('company.edit');
        Route::post('/company', [\App\Http\Controllers\Admin\CompanyProfileController::class, 'update'])->name('company.update');
        Route::get('/contact', [\App\Http\Controllers\Admin\ContactSettingsController::class, 'edit'])->name('contact.edit');
        Route::post('/contact', [\App\Http\Controllers\Admin\ContactSettingsController::class, 'update'])->name('contact.update');

        // Services Management
        Route::get('/services', [\App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('services.index');
        Route::get('/services/create', [\App\Http\Controllers\Admin\ServiceController::class, 'create'])->name('services.create');
        Route::post('/services', [\App\Http\Controllers\Admin\ServiceController::class, 'store'])->name('services.store');
        Route::get('/services/{category}/edit', [\App\Http\Controllers\Admin\ServiceController::class, 'edit'])->name('services.edit');
        Route::post('/services/{category}', [\App\Http\Controllers\Admin\ServiceController::class, 'update'])->name('services.update');
        Route::delete('/services/{category}', [\App\Http\Controllers\Admin\ServiceController::class, 'destroy'])->name('services.destroy');

        // Service Items
        Route::post('/services/{category}/items', [\App\Http\Controllers\Admin\ServiceController::class, 'storeItem'])->name('services.items.store');
        Route::delete('/services/items/{item}', [\App\Http\Controllers\Admin\ServiceController::class, 'destroyItem'])->name('services.items.destroy');

        // Projects Management
        Route::get('/projects', [\App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('projects.index');
        Route::get('/projects/create', [\App\Http\Controllers\Admin\ProjectController::class, 'create'])->name('projects.create');
        Route::post('/projects', [\App\Http\Controllers\Admin\ProjectController::class, 'store'])->name('projects.store');
        Route::get('/projects/{project}/edit', [\App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('projects.edit');
        Route::post('/projects/{project}', [\App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{project}', [\App\Http\Controllers\Admin\ProjectController::class, 'destroy'])->name('projects.destroy');

        // Project Images
        Route::post('/projects/{project}/images', [\App\Http\Controllers\Admin\ProjectController::class, 'uploadImage'])->name('projects.images.upload');
        Route::delete('/projects/images/{image}', [\App\Http\Controllers\Admin\ProjectController::class, 'destroyImage'])->name('projects.images.destroy');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// load auth routes if available
if (file_exists(__DIR__.'/auth.php')) {
    require __DIR__.'/auth.php';
}
