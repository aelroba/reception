<?php

use Illuminate\Support\Facades\Route;

Route::get('/test-database', function () {
    try {
        \DB::connection()->getPdo();
        print_r("Connected successfully to: " . \DB::connection()->getDatabaseName());
    } catch (\Exception $e) {
        die("Could not connect to the database.  Please check your configuration. Error:" . $e );
    }
});

Route::get('/', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/delete/{id}', [\App\Http\Controllers\AuthController::class, 'delete'])->name('delete');
Route::get('/delete_all_reports', [\App\Http\Controllers\AuthController::class, 'deleteAll'])->name('delete.all');
Route::get('/report', [\App\Http\Controllers\AuthController::class, 'report'])->name('report');
Route::get('/cards', [\App\Http\Controllers\AuthController::class, 'cards'])->name('cards');
Route::get('/secretary', [\App\Http\Controllers\AuthController::class, 'secretary'])->name('secretary');
Route::post('/send_visitor', [\App\Http\Controllers\AuthController::class, 'sendVisitor'])->name('login.send_visitor');
Route::post('/update_status', [\App\Http\Controllers\AuthController::class, 'updateStatus'])->name('login.update_status');
Route::post('/other_status', [\App\Http\Controllers\AuthController::class, 'otherStatus'])->name('login.other_status');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
});
