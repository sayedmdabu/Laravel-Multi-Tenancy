<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TenantController;
use App\Http\Controllers\{ProfileController, TenantController};
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return view('app.welcome');
        dd(tenant()->toArray());
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });





    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Tenants
        // Route::get('/tenants', [TenantController::class, 'index'])->name('tenants.index');
        // Route::get('/tenants/create', [TenantController::class, 'create'])->name('tenants.create');
        // Route::post('/tenants', [TenantController::class, 'store'])->name('tenants.store');
        // Route::get('/tenants/{tenant}', [TenantController::class, 'show'])->name('tenants.show');
        // Route::get('/tenants/{tenant}/edit', [TenantController::class, 'edit'])->name('tenants.edit');
        // Route::put('/tenants/{tenant}', [TenantController::class, 'update'])->name('tenants.update');
        // Route::delete('/tenants/{tenant}', [TenantController::class, 'destroy'])->name('tenants.destroy');
    });

    require __DIR__.'/tenant-auth.php';
});
