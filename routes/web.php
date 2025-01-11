<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UsersController;

//Users Routes
Route::match(['post','get'],'/',[UsersController::class,'login'])->name('login');
// Routes with Auth Middleware
Route::middleware('auth')->group(function () {
    Route::get('/logout',[UsersController::class,'logout'])->name('users.logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        // Settings
        Route::match(['post','get'],'/settings', [DashboardController::class, 'setting'])->name('dashboard.setting');

    // Payments
    Route::get('/now-payments', [PaymentsController::class, 'index'])->name('payment.index');

    // Reports
    Route::get('/statistics', [ReportsController::class, 'statistics'])->name('report.statistics');
    Route::get('/conversions', [ReportsController::class, 'conversions'])->name('report.conversions');
    Route::get('/postbacks', [ReportsController::class, 'postbacks'])->name('report.postbacks');
    Route::get('/exported-reports', [ReportsController::class, 'exported'])->name('report.exported');

    // Apps
    Route::get('/apps', [AppsController::class, 'index'])->name('apps.index');
    Route::match(['get','post'],'/add-app/{id?}', [AppsController::class, 'add'])->name('apps.add');
    Route::get('/test-postback', [AppsController::class, 'testPostback'])->name('apps.testpostback');
    Route::get('/integration/{id}', [AppsController::class, 'integration'])->name('apps.integration');
    Route::get('/update-status/{id}', [AppsController::class, 'updateStatus'])->name('apps.status');

    // Chart Data
    Route::get('/chart-data', [ChartController::class, 'chartData'])->name('chart.data');
});
