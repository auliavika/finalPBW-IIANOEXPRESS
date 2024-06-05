<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TicketController;
use App\Models\City;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/', [ScheduleController::class, 'index']);

   

    Route::get('/home', [ScheduleController::class, 'showSearchForm'])->name('home');
    Route::post('/search-schedule', [ScheduleController::class, 'search'])->name('schedules.search');

    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/{schedule}', [BookingController::class, 'create'])->name('booking.create');
    
   

    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');
    Route::get('/tickets/history', [TicketController::class, 'history'])->name('tickets.history');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
}); 
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'totalPendapatan'])->name('admin.home');
   
    Route::get('/admin/schedules', [ScheduleController::class, 'index'])->name('admin.schedules.index');
    Route::get('admin/tickets/pending', [TicketController::class, 'pendingTickets'])->name('admin.tickets.pending');

    Route::resource('buses', BusController::class);
    Route::resource('schedules', ScheduleController::class);

    
    Route::put('admin/tickets/{ticket}/verify', [TicketController::class, 'verify'])->name('admin.tickets.verify');
    Route::delete('admin/tickets/{ticket}/reject', [TicketController::class, 'reject'])->name('admin.tickets.reject');

    Route::get('/admin/buses', [BusController::class, 'index'])->name('admin.buses.index');
    
});