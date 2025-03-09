<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\SpeakerController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\EventDayController;
use App\Http\Controllers\Admin\EventAgendaController;

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

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// About Page
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Speakers Page
Route::get('/speakers', [HomeController::class, 'speakers'])->name('speakers');

Auth::routes();


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
  // Guest routes
  Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');
  });

  // Protected routes
  Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Speakers management
    Route::resource('speakers', SpeakerController::class);

    // Event Days Management
    Route::resource('event-days', \App\Http\Controllers\Admin\EventDayController::class);

    // Event Agendas Management (nested under event days)
    Route::resource('event-days.agendas', \App\Http\Controllers\Admin\EventAgendaController::class)->except(['show']);
  });
});
