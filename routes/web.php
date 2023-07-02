<?php

declare(strict_types=1);

use App\Http\Controllers\CollageController;
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

Route::controller(CollageController::class)->group(function () {
    Route::get('/', 'index')->name('collage.index');
    Route::post('/', 'store')->name('collage.store');;
});