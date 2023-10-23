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
Route::get('/cards', [\App\Http\Controllers\AuthController::class, 'cards'])->name('cards');
Route::get('/secretary', [\App\Http\Controllers\AuthController::class, 'secretary'])->name('secretary');
Route::post('/send_visitor', [\App\Http\Controllers\AuthController::class, 'sendVisitor'])->name('login.send_visitor');
Route::post('/update_status', [\App\Http\Controllers\AuthController::class, 'updateStatus'])->name('login.update_status');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [\App\Http\Controllers\DashboardController::class, 'profile'])->name('dashboard.get.profile');
    Route::post('/profile', [\App\Http\Controllers\DashboardController::class, 'postProfile'])->name('dashboard.post.profile');

    Route::resource('templates', \App\Http\Controllers\Templates\TemplateController::class)->middleware('role:admin');
    Route::resource('goals', \App\Http\Controllers\Templates\GoalController::class)->middleware('role:admin');
    Route::resource('goal_items', \App\Http\Controllers\Templates\GoalItemController::class)->middleware('role:admin');

    /******************************************* Employees ***************************************************/
    Route::post('employees/{rating}/reject_review', [\App\Http\Controllers\EmployeesController::class, 'postRejectReviewRating'])->name('employees.post.reject_review');
    Route::get('employees/{rating}/reject_review', [\App\Http\Controllers\EmployeesController::class, 'showRejectReviewRating'])->name('employees.show.reject_review');
    Route::post('employees/{rating}/review', [\App\Http\Controllers\EmployeesController::class, 'postReviewRating'])->name('employees.post.review');
    Route::get('employees/{rating}/review', [\App\Http\Controllers\EmployeesController::class, 'showReviewRating'])->name('employees.show.review');
    Route::post('employees/{rating}/adopt', [\App\Http\Controllers\EmployeesController::class, 'postAdoptRating'])->name('employees.post.adopt');
    Route::get('employees/{rating}/adopt', [\App\Http\Controllers\EmployeesController::class, 'showAdoptRating'])->name('employees.show.adopt');
    Route::delete('employees/{rating}/destroy_rating', [\App\Http\Controllers\EmployeesController::class, 'destroyRating'])->name('employees.destroy.rating');
    Route::get('employees/{rating}/show_rating', [\App\Http\Controllers\EmployeesController::class, 'showRating'])->name('employees.show.rating');
    Route::get('employees/{employee}/{template}', [\App\Http\Controllers\EmployeesController::class, 'rating'])->name('employees.rating');
    Route::post('employees/save_rating/{template}', [\App\Http\Controllers\EmployeesController::class, 'saveRating'])->name('employees.save_rating');
    Route::resource('employees', \App\Http\Controllers\EmployeesController::class);
    /******************************************* Employees ***************************************************/

    Route::resource('departments', \App\Http\Controllers\DepartmentsController::class)->middleware('role:admin');
    Route::resource('users', \App\Http\Controllers\UsersController::class)->middleware('role:admin');
});
