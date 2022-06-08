<?php

use App\Http\Controllers\Payment\CheckoutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Livewire\User\ListUsers;
use App\Http\Livewire\Category\ListCategory;
use App\Http\Livewire\Location\ListLocation;
use App\Http\Livewire\Promotion\ListPromotion;
use App\Http\Livewire\Blog\ListBlog;
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

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/events', [EventController::class, 'events'])->name('events');

Route::get('/event/{event:slug}', [EventController::class, 'event_details'])->name('event');

Route::get('/about-us', [PageController::class, 'about_us'])->name('about_us');

Route::get('/privacy-policy', [PageController::class, 'privacy_policy'])->name('privacy_policy');

Route::get('/terms-of-service', [PageController::class, 'terms_of_service'])
    ->name('terms_of_service');

Route::get('/faq', [PageController::class, 'faq'])->name('faq');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::controller(ProfileController::class)
        ->prefix('profile')
        ->name('profile.')
        ->group(function () {
            Route::get('/my-account', 'my_account')->name('my_account');

            Route::get('/account-details', 'account_details')->name('account_details');
            Route::post('/account-details', 'store_account_details')->name('store_account_details');

            Route::get('/my-orders', 'my_orders')->name('my_orders');
            Route::get('/order-details/{code}', 'order_details')->name('order_details');
            Route::get('/order-details/{code}/pdf', 'order_details_pdf')->name('order_details_pdf');

            Route::get('/change-password', 'change_password')->name('change_password');
            Route::post('/change-password', 'store_change_password')->name('store_change_password');
        });

    Route::get('/checkout/{event:slug}', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/payment', [PaymentController::class, 'payment'])->name('payment');
});
Route::get('/order-validate/{code}', function ($code) {
    return "Aquí se valida el ticket a través de la aplicación que no voi hacer :D";
})->name('order_validate');


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
