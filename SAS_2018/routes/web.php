<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/pages/login/index');
})->name('login');

Route::get('/dashboard', function () {
    return view('/pages/dashboard/index');
});


/*
|--------------------------------------------------------------------------
| API
|--------------------------------------------------------------------------
*/

Route::prefix('API')->group(function () {
    Route::post('/authenticate', 'AuthController@login')->name('auth');
});
