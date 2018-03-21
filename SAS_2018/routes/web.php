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
})->name('dashboard');

Route::get('/reservation', function () {
    return view('/pages/reservation/index');
})->name('reservation');

Route::get('/home', function () {
    return view('/pages/user/index');
})->name('home');

Route::prefix('maintenance')->group(function () {
    Route::get('/service', 'ServiceController@viewAll')->name('service');
    Route::get('/staff', 'StaffController@viewAll')->name('staff');
    Route::get('/package', 'PackageController@viewAll')->name('package');
});

/*
|--------------------------------------------------------------------------
| API
|--------------------------------------------------------------------------
*/

Route::prefix('API')->group(function () {
    Route::post('/authenticate', 'AuthController@login')->name('auth');
    Route::prefix('maintenance')->group(function () {
        //Service Functionalities
        Route::post('/addNewService', 'ServiceController@addNewService');
        Route::post('/deleteService', 'ServiceController@deleteService');
        Route::get('/getSingleService', 'ServiceController@getSingleService');
        Route::post('/editService', 'ServiceController@editService');

        //Service Type Functionalities
        Route::post('/addNewServiceType', 'ServiceController@addNewServiceType');
        Route::post('/deleteServiceType', 'ServiceController@deleteServiceType');
        Route::get('/getSingleServiceType', 'ServiceController@getSingleServiceType');
        Route::post('/editServiceType', 'ServiceController@editServiceType');

        //Staff Functionalities
        Route::post('/addNewStaff', 'StaffController@addNewStaff');
        Route::post('/deleteStaff', 'StaffController@deleteStaff');
        Route::get('/getSingleStaff', 'StaffController@getSingleStaff');
        Route::post('/editStaff', 'StaffController@editStaff');

        //Package Functionalities
        Route::post('/addNewPackage', 'PackageController@addNewPackage');
        Route::post('/deletePackage', 'PackageController@deletePackage');
        Route::get('/getSinglePackage', 'PackageController@getSinglePackage');
        Route::post('/editPackage', 'PackageController@editPackage');
    });
});
