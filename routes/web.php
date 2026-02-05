<?php

use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\OwnerController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\VehicleReportController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('admin')->group(function () {
        Route::resource('conductores', DriverController::class)
            ->names('admin.drivers')
            ->parameters(['conductores' => 'driver'])
            ->except(['show']);

        Route::resource('propietarios', OwnerController::class)
            ->names('admin.owners')
            ->parameters(['propietarios' => 'owner'])
            ->except(['show']);

        Route::resource('vehiculos', VehicleController::class)
            ->names('admin.vehicles')
            ->parameters(['vehiculos' => 'vehicle'])
            ->except(['show']);

        Route::get('informe/vehiculos', [VehicleReportController::class, 'index'])
            ->name('admin.reports.vehicles.index');

        Route::get('informe/vehiculos/pdf', [VehicleReportController::class, 'pdf'])
            ->name('admin.reports.vehicles.pdf');
    });
});

require __DIR__.'/settings.php';
