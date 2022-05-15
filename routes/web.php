<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\User\ListUsers;
use App\Http\Livewire\Category\ListCategory;
use App\Http\Livewire\Location\ListLocation;
use App\Http\Livewire\Promotion\ListPromotion;
use App\Http\Livewire\Blog\ListBlog;
use App\Http\Livewire\Event\CreateEvent;
use App\Http\Livewire\Event\ListEvent;
use App\Http\Livewire\Payment\ListPayment;
use App\Http\Livewire\Payment\ViewPayment;
use App\Http\Livewire\Session\ListSession;
use App\Http\Livewire\TicketType\ListTicketType;
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

// Route::get('/', function () {
//     return Inertia::render('Home/Home');
// })->name('home');
Route::get('/event/{slug}', function () {
    return Inertia::render('Home/Home');
})->name('event');

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/events', [EventController::class, 'events'])->name('events');

Route::get('/about-us', function () {
    return Inertia::render('AboutUs/AboutUs');
})->name('about-us');

// Route::get('/movies', function () {
//     return Inertia::render('Movies/MovieList/MovieList');
// })->name('movies');

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
    return Inertia::render('EventDetails/EventDetails');
})->name('event-details');

Route::get('/event{event:slug}', function () {
    
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
    Route::get('/promotions', ListPromotion::class)->name('promotions');
    Route::get('/blog', ListBlog::class)->name('blog');
    Route::get('/events', ListEvent::class)->name('events');
    Route::get('/event/{event}/ticket-types', ListTicketType::class)->name('ticket-types');
    Route::get('/event/{event}/sessions', ListSession::class)->name('sessions');
    Route::get('/payments', ListPayment::class)->name('payments');
    Route::get('/payments-view/{payment}', ViewPayment::class)->name('payments-view');
    // Route::get('/edit-event/{id}', CreateEvent::class)->name('edit-event');
    //Route::get('/event/{id}/ticket-types', ListTicketType::class)->name('ticket-types');
    //Route::get('/event/{id}/session', CreateEvent::class)->name('create-event');

    //
    //Route::get('/order', ListOrder::class)->name('order');
});


require __DIR__ . '/auth.php';
