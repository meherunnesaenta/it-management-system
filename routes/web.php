<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EquipmentController as AdminEquipmentController;
use App\Http\Controllers\Admin\TicketController as AdminTicketController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ITStaff\DashboardController as StaffDashboardController;
use App\Http\Controllers\ITStaff\TicketController as StaffTicketController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\PaymentController as StudentPaymentController;
use App\Http\Controllers\Student\TicketController as StudentTicketController;
use Illuminate\Support\Facades\Route;

// ✅ হোমপেজ (ওয়েলকাম পেজ রিমুভ)
Route::get('/', [HomeController::class, 'index'])->name('home');

// ✅ ড্যাশবোর্ড (Auth + রোল অনুযায়ী রিডাইরেক্ট)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified', 'role:super-admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/tickets', [AdminTicketController::class, 'index'])->name('tickets.index');
        Route::get('/tickets/create', [AdminTicketController::class, 'create'])->name('tickets.create');
        Route::post('/tickets', [AdminTicketController::class, 'store'])->name('tickets.store');
        Route::get('/tickets/{ticket}', [AdminTicketController::class, 'show'])->name('tickets.show');
        Route::patch('/tickets/{ticket}', [AdminTicketController::class, 'update'])->name('tickets.update');
        Route::get('/tickets/{ticket}/edit', [AdminTicketController::class, 'edit'])->name('tickets.edit');
        Route::put('/tickets/{ticket}/resolve', [AdminTicketController::class, 'resolve'])->name('tickets.resolve');
        Route::post('/tickets/{ticket}/respond', [AdminTicketController::class, 'respond'])->name('tickets.respond');
        Route::delete('/tickets/{ticket}', [AdminTicketController::class, 'destroy'])->name('tickets.destroy');
        Route::get('/equipments', [AdminEquipmentController::class, 'index'])->name('equipments.index');
        Route::get('/equipments/create', [AdminEquipmentController::class, 'create'])->name('equipments.create');
        Route::post('/equipments', [AdminEquipmentController::class, 'store'])->name('equipments.store');
        Route::get('/equipments/{equipment}/edit', [AdminEquipmentController::class, 'edit'])->name('equipments.edit');
        Route::patch('/equipments/{equipment}', [AdminEquipmentController::class, 'update'])->name('equipments.update');
        Route::delete('/equipments/{equipment}', [AdminEquipmentController::class, 'destroy'])->name('equipments.destroy');
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::get('/reports', [AdminReportController::class, 'index'])->name('reports');
    });

Route::middleware(['auth', 'verified', 'role:it-staff'])
    ->prefix('it-staff')
    ->name('it-staff.')
    ->group(function () {
        Route::get('/dashboard', [StaffDashboardController::class, 'index'])->name('dashboard');
        Route::get('/tickets', [StaffTicketController::class, 'index'])->name('tickets.index');
        Route::get('/tickets/{ticket}', [StaffTicketController::class, 'show'])->name('tickets.show');
        Route::post('/tickets/{ticket}/assign', [StaffTicketController::class, 'assign'])->name('tickets.assign');
        Route::post('/tickets/{ticket}/resolve', [StaffTicketController::class, 'resolve'])->name('tickets.resolve');
    });

Route::middleware(['auth', 'verified', 'role:student'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {
        Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
        Route::get('/tickets', [StudentTicketController::class, 'index'])->name('tickets.index');
        Route::get('/tickets/create', [StudentTicketController::class, 'create'])->name('tickets.create');
        Route::post('/tickets', [StudentTicketController::class, 'store'])->name('tickets.store');
        Route::get('/tickets/{ticket}', [StudentTicketController::class, 'show'])->name('tickets.show');
        Route::get('/payments/create', [StudentPaymentController::class, 'create'])->name('payments.create');
        Route::post('/payments', [StudentPaymentController::class, 'store'])->name('payments.store');
    });

// ✅ প্রোফাইল রুট (Auth প্রয়োজন)
Route::middleware('auth')->group(function () {
    Route::post('/notifications/read-all', function () {
        request()->user()->unreadNotifications->markAsRead();

        return back();
    })->name('notifications.read-all');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Auth Routes (Breeze)
require __DIR__.'/auth.php';