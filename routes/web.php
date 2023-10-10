<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return redirect(app()->getLocale());
});
Route::prefix('{locale}')
    ->middleware(['setlocale', 'setDefaultLocaleForUrls'])
    ->where(['locale' => '[a-zA-Z]{2}'])
    ->group(function () {
    require __DIR__.'/main.php';
});
