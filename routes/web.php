<?php

use App\Http\Livewire\User\ListUsers;
use App\Http\Livewire\Category\ListCategory;
use App\Http\Livewire\Location\ListLocation;
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
    return Inertia::render('Movies/MovieList/MovieList');
})->name('movies');

Route::get('/movie-details', function () {
    return Inertia::render('Movies/MovieDetails/MovieDetails');
})->name('movie-details');

Route::get('/movie-ticket', function () {
    return Inertia::render('Movies/MovieTicket/MovieTicket');
})->name('select-ticket');

Route::get('/movie-food', function () {
    return Inertia::render('Movies/MovieFood/MovieFood');
})->name('select-food');

Route::get('/checkout', function () {
    return Inertia::render('Checkout/Checkout');
})->name('checkout');

Route::get('/event-details', function () {
    return Inertia::render('Events/EventDetails/EventDetails');
})->name('event-details');

Route::get('/event-ticket', function () {
    return Inertia::render('Events/EventTicket/EventTicket');
})->name('event-ticket');



// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'can:dashboard'])->prefix('dashboard')->name('dashboard.')->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('home');

    Route::get('/users', ListUsers::class)->name('users');
    Route::get('/categories', ListCategory::class)->name('categories');
    Route::get('/locations', ListLocation::class)->name('locations');
    //Route::get('/gift_card', ListGiftCard::class)->name('gift_card');
    //Route::get('/discount_code', ListDiscountCode::class)->name('discount_code');
    //Route::get('/gallery', ListGallery::class)->name('gallery');
    //Route::get('/page', ListPage::class)->name('page');
    //Route::get('/promo', ListPromo::class)->name('promo');
    //Route::get('/order', ListOrder::class)->name('order');
});


require __DIR__ . '/auth.php';
