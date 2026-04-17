<?php

use App\Http\Controllers\Admin\Rules\RuleController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\UserActions\ActionController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Notification\NotificationSentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserActionController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('logout', [LogoutController::class, 'index'])
        ->name('logout');

    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::middleware('admin')->group(function () {
        Route::get('/rules-import', [RuleController::class, 'showImport'])
            ->name('rules.import');

        Route::post('/rules-import', [RuleController::class, 'import'])
            ->name('rules.import');

        Route::get('/rules-export', [RuleController::class, 'export'])
            ->name('rules.export');

        Route::resource('rules', RuleController::class);

        Route::get('/notifications-sent', [NotificationSentController::class, 'index'])
            ->name('notifications-sent');

        Route::get('/user-actions', [ActionController::class, 'index'])
            ->name('user-actions');

        Route::get('/users', [UserController::class, 'index'])
            ->name('users');
    });
});

//non-admin user routes
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::post('/user-events', [UserActionController::class, 'store'])
        ->name('user-events.store');
});



require __DIR__ . '/auth.php';
