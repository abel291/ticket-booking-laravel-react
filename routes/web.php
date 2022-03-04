<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return Inertia::render('Home/Home');
})->name('home');

Route::get('/about-us', function () {
    return Inertia::render('AboutUs/AboutUs');
})->name('about-us');

Route::get('/movies', function () {
    return Inertia::render('ListMovies/ListMovies');
})->name('movies');

Route::get('/movie-details', function () {
    return Inertia::render('MovieDetails/MovieDetails');
})->name('movie-details');

Route::get('/select-ticket', function () {
    return Inertia::render('SelectTicket/Ticket');
})->name('select-ticket');

Route::get('/select-food', function () {
    return Inertia::render('SelectFood/Food');
})->name('select-food');

Route::get('/checkout', function () {
    return Inertia::render('Checkout/Checkout');
})->name('checkout');

Route::get('/event-details', function () {
    return Inertia::render('EventDetails/EventDetails');
})->name('event-details');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
