<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

use App\Http\Controllers\Common\RouteController;

use App\Http\Controllers\Admin\Tour\TourPackageController;
use App\Http\Controllers\Admin\DestinationCountry\DestinationCountryController;


use App\Http\Controllers\Frontend\Home\HomeController;
use App\Http\Controllers\Frontend\Tour\ToursController;
use App\Http\Controllers\Frontend\Destination\DestinationController;



use App\Http\Controllers\Admin\PO\PurchaseOrderController;

use App\Http\Controllers\Admin\Backup\BackupController;

use App\Http\Controllers\Admin\Log\ActivityLogController;

use App\Http\Controllers\Admin\ToDo\ToDoController;
use App\Http\Controllers\Admin\ToDo\ToDoProjectController;
use App\Http\Controllers\Admin\ToDo\ToDoTaskController;

use App\Http\Controllers\Admin\VisitorInfo\VisitorUserController;


use Illuminate\Support\Facades\Route;


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


Route::get('/', [HomeController::class, 'index'])->name('home');


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Destination Routes
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    Route::controller(DestinationController::class)->group(function() {

        Route::prefix('destination')->group(function () {

            Route::get('/all', 'index')->name('destination');
            Route::get('/details/{id}/{slug}', 'destinationDetail')->name('destination.detail');

        });

    });


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Tour Routes
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    Route::controller(ToursController::class)->group(function() {

        Route::prefix('tours')->group(function () {

            Route::get('/all', 'index')->name('tours');
            Route::get('/details/{id}/{slug}', 'tourPackageDetail')->name('tour.details');

        });

    });


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

    // Route::get('{any}', [RouteController::class, 'index'])->name('index');


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | PO Routes
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    Route::controller(PurchaseOrderController::class)->group(function() {

        Route::prefix('po')->group(function () {

            Route::get('/show', 'index')->name('po.lists');

            Route::get('/detail/{slug}', 'poListDetailPageLoad')->name('po.detail.view');
            Route::get('/file/download/{fileName}/{filePath}', 'downloadFile')->name('po.download.file');

            Route::post('/print/view', 'poPrintView')->name('po.print.view');
            Route::post('/list/store/bill', 'poAddBill')->name('po.list.store.bill');

            Route::get('/load/store-page', 'poAddPage')->name('po.add');

            Route::get('/load/vat-ait/{po_no}', 'poVatAit');

            Route::post('/add', 'poInsert')->name('po.insert');
            Route::get('/load/{slug}', 'poEditPageLoad')->name('po.editpage.load');
            Route::post('/update/{slug}', 'poUpdate')->name('po.update');
            Route::get('/delete/{slug}', 'poDelete')->name('po.delete');

            Route::post('/list/add', 'poListInsert')->name('po.list.insert');
            Route::get('/list/load/{listID}', 'poListEditPageLoad')->name('po.list.editpage.load');
            Route::post('/list/update/{listID}', 'poListUpdate')->name('po.list.update');
            Route::get('/list/delete/{listID}', 'poListDelete')->name('po.list.delete');

        });

    });



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Tour Package Routes
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    Route::controller(TourPackageController::class)->group(function() {

        Route::prefix('tour-package')->group(function () {

            Route::get('/show', 'index')->name('tour.package.lists');
            Route::get('/detail/{slug}', 'tourPackageDetailPageLoad')->name('tourPackage.detail.view');
            Route::get('/load/store-page', 'loadTourPackageAddPage')->name('load.tourPackage.storepage');
            Route::post('/add', 'tourPackageInsert')->name('tour.package.insert');
            Route::get('/load/{id}/{slug}', 'loadTourPackageEditPage')->name('load.tourPackage.editpage');
            Route::post('/update/{slug}', 'tourPackageUpdate')->name('tour.package.update');
            Route::get('/delete/{slug}', 'tourPackageDelete')->name('tour.package.delete');
            Route::get('/delete/image/{id}', 'tourPackageImageDelete');
            Route::get('/status/update/{id}', 'packageStatusUpdate');

            Route::post('/details/add', 'packageDetailsInsert')->name('tour.package.details.insert');

            Route::post('/included-service/update', 'incServiceUpdate')->name('incServiceUpdate');
            Route::post('/excluded-service/update', 'excServiceUpdate')->name('excServiceUpdate');
            Route::post('/tour-plan/update', 'tourPackagePlanUpdate')->name('tourPackagePlanUpdate');
            Route::get('/delete/included-service/{id}', 'includedServiceDelete');
            Route::get('/delete/excluded-service/{id}', 'excludedServiceDelete');
            Route::get('/delete/tour-plan/{id}', 'tourPlanDelete');

        });

    });


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Destination Country Routes
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    Route::controller(DestinationCountryController::class)->group(function() {

        Route::prefix('destination-country')->group(function () {

            Route::get('/show', 'index')->name('destination.country.lists');
            Route::get('/load/store-page', 'loadDestinationCountryAddPage')->name('load.destination.country.storepage');
            Route::post('/add', 'destinationCountryInsert')->name('destination.country.insert');
            Route::get('/load/{slug}', 'loadDestinationCountryEditPage')->name('load.destination.country.editpage');
            Route::post('/update/{slug}', 'destinationCountryUpdate')->name('destination.country.update');
            Route::get('/delete/{slug}', 'destinationCountryDelete')->name('destination.country.delete');

        });

    });



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Backup Routes
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    Route::get('/backup/database', [BackupController::class, 'backup_database'])->name('backup.database');



    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Log Routes
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    Route::get('/activity-log', [ActivityLogController::class, 'index'])->name('activity.log');
    Route::get('/activity-log/{limit}/{offset}', [ActivityLogController::class, 'ajaxLoad'])->name('activity.log.load');
    Route::get('/activity-log/delete/{id}', [ActivityLogController::class, 'delete'])->name('activity.log.delete');
    Route::get('/activity-log/search/{text}/{duration}', [ActivityLogController::class, 'liveSearch'])->name('activity.log.search');


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | To DO Routes
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    Route::get('/to-do', [ToDoController::class, 'index'])->name('todo.list');

    Route::post('/to-do/project/add', [ToDoProjectController::class, 'addProject'])->name('todo.project.add');
    Route::get('/to-do/project/{slug}/details', [ToDoProjectController::class, 'loadProject'])->name('todo.project.details');
    Route::post('/to-do/project/update', [ToDoProjectController::class, 'updateProject'])->name('todo.project.update');
    Route::get('/to-do/project/delete/{slug}', [ToDoProjectController::class, 'deleteProject'])->name('todo.project.delete');

    Route::controller(ToDoTaskController::class)->group(function() {
        Route::post('/to-do/task/add', 'addTask')->name('todo.task.add');
        Route::get('/to-do/task/{id}/details', 'loadTask')->name('todo.task.details');
        Route::post('/to-do/task/{id}/update', 'updateTask')->name('todo.task.update');
        Route::get('/to-do/task/{taskID}/{status}', 'ajaxStatusUpdate')->name('todo.task.ajax.status');
        Route::get('/task/delete/{id}', 'taskDelete')->name('todo.delete.task');
    });


    /*
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    |
    | Visitor Informations Routes
    |
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    */

    Route::get('/visitor-informations', [VisitorUserController::class, 'index'])->name('visitor.infos');


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
