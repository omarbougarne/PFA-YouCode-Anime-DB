<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentsController;





Route::get('/', [AnimeController::class, 'index'])->name('home');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
Route::post('/admin/restore/{id}', [AdminController::class, 'restore'])->name('admin.restore');
Route::get('/register', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
Route::resource('anime', AnimeController::class);
Route::post('/anime/{anime}', [AnimeController::class, 'show'])->name('anime.comments.store');




Route::post('/comments', [CommentsController::class, 'store'])->name('comments.store');

Route::group(['middleware' => 'role:admin'], function () {
    //sooooon
});

Route::group(['middleware' => 'role:mod'], function () {
    // sooooooon
});

Route::group(['middleware' => 'role:user'], function () {
    // sooooooooooooon
});




































// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
// });
// Route::middleware(['auth', 'role:user'])->group(function () {
//     Route::get('/user', [UserController::class, 'index'])->name('users.dashboard');
// });
