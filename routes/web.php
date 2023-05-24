<?php


use App\Http\Controllers\AuthPersonController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [IndexController::class, 'index'])->name('home');

Route::group(['namespace' => 'Person', 'prefix' => 'person'], function () {
    Route::get('/', [PersonController::class, 'index'])->name(
        'main.person'
    );
    Route::get('/create', [PersonController::class, 'create'])->name(
        'create.person'
    );
    Route::post('/', [PersonController::class, 'store'])->name(
        'store.person'
    );
    Route::get('/{person}', [PersonController::class, 'show'])->name(
        'show.person'
    );
    Route::get('/{person}/edit', [PersonController::class, 'edit'])->name(
        'edit.person'
    );
    Route::patch('/{person}', [PersonController::class, 'update'])->name(
        'update.person'
    );
    Route::delete('/{person}', [PersonController::class, 'destroy'])->name(
        'delete.person'
    );
});






