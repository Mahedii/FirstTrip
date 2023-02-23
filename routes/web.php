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

