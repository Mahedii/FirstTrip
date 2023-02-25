<?php

use App\Http\Controllers\Common\RouteController;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

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
    return view('frontend.index');
})->name("home");

Route::get('/destination', function () {
    return view('frontend.destination.destination');
})->name("destination");

Route::get('/destination-detail', function () {
    return view('frontend.destination.destination-detail');
})->name("destination.detail");

Route::get('/tours', function () {
    return view('frontend.tours.tours');
})->name("tours");

Route::get('/tours-list', function () {
    return view('frontend.tours.tours-list');
})->name("tours.list");

Route::get('/tour-details', function () {
    return view('frontend.tours.tour-detail');
})->name("tour.details");


Route::get('/administrator', function () {
    return view('admin.dashboard');
})->name("admin");

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name("dashboard");

Route::get('/tour-package/add', function () {
    return view('admin.tours.add.index');
})->name("tour.package.add");


/*
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
|
| ------- Admin Routes Starts Here -------
|
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
*/

Route::get('/admin/signin', [AuthController::class, 'signInPage'])->name('signin-page');
Route::post('user-signin', [AuthController::class, 'userSignin'])->name('user.signin');
Route::get('user-signout', [AuthController::class, 'signOut'])->name('user.signout');

Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');


Route::group(['middleware' => ['auth']], function() {


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | User Routes
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    Route::controller(UserController::class)->group(function() {

        Route::get('/users/add-user', 'addUserPage')->name('add.user');
        Route::post('/users/add-custom-user', 'customUserSignup')->name('add.custom.user');
        Route::get('/users/user-lists', 'userListPage')->name('user.lists');
        Route::get('/users/user-delete/{id}', 'deleteUser')->name('user.delete');
        Route::get('/users/user-edit/{id}', 'loadEditUserPage')->name('user.edit');
        Route::post('/users/edit-custom-user/{id}', 'editCustomUser')->name('edit.custom.user');

    });

    Route::get('{any}', [RouteController::class, 'index'])->name('index');

    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Roles & Permission Routes
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});
