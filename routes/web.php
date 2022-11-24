<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ImageHandleController;
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

Route::get('/', function () {
    return view('coming-soon');
})->name('home');

Route::get('/uploads/private/{image}', [ImageHandleController::class, 'private'])->name('image.private');

Route::get('/error-admin', function () { return view('errors.admin'); })->name('error.admin');
Route::get('/error-active', function () { return view('errors.active'); })->name('error.active');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified','active'])
    ->prefix('dashboard')
    ->group(function () {

    Route::middleware(['admin'])->group(function () {
        //Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        //Image
        Route::get('/image', [ImageController::class, 'index'])->name('image.index');
        Route::put('/image', [ImageController::class, 'update'])->name('image.update');
        Route::put('/image-delete-public', [ImageController::class, 'deletepublic'])->name('image.delete-public');
        Route::put('/image-delete-private', [ImageController::class, 'deleteprivate'])->name('image.delete-private');
        Route::put('/image-delete-name', [ImageController::class, 'deletename'])->name('image.delete-name');
        Route::put('/image-delete-compress', [ImageController::class, 'deletecompress'])->name('image.delete-compress');
        Route::put('/image-delete-dir', [ImageController::class, 'deletedir'])->name('image.delete-dir');
        Route::put('/image-delete-photo/{id}', [ImageController::class, 'deleteimage'])->name('image.delete-photo');

        //Setting
            //User
            Route::resource('/setting/user', UserController::class);
            Route::get('/profile', [UserController::class, 'profile'])->name('profile');
            Route::put('/profile', [UserController::class, 'updateprofile'])->name('profile.update');
            Route::put('/setting/user-reset/{user}', [UserController::class, 'updatepassword'])->name('user.reset');

        //Table
        Route::get('/setting/data/user', [DataController::class, 'datauser'])->name('data.user');
    });

});
