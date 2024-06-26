<?php

use App\Http\Livewire\SuplierList;
use Illuminate\Support\Facades\Auth;
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
    return redirect('login');
});

// Auth::routes();
Auth::routes([
    'register' => false
]);

Route::middleware(['auth', 'checkStatus'])->group(function (){
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index']);
    Route::get('/submission', [App\Http\Controllers\SubmissionController::class, 'index']);
    Route::get('/edit-profile', [App\Http\Controllers\EditProfileController::class, 'index']);
    Route::get('/edit-password', [App\Http\Controllers\ChangePasswordController::class, 'index']);
    Route::get('/inventory', [App\Http\Controllers\InventoryController::class, 'index']);
});

Route::middleware(['auth', 'rolePermision', 'checkStatus'])->group(function (){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('/request', [App\Http\Controllers\RequestController::class, 'index']);
    Route::get('/user-management', [App\Http\Controllers\UserManagementController::class, 'index']);
    Route::get('/position', [App\Http\Controllers\PositionController::class, 'index']);
    Route::get('/incoming', [App\Http\Controllers\IncomingController::class, 'index']);
    Route::get('/suplier', [App\Http\Controllers\SuplierController::class, 'index']);
});


