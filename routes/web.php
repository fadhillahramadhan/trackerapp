<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackerController;
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

Route::get('/', [TrackerController::class, 'show']);
// Route::get()
// show echo shwo
Route::get('/show', function () {
    echo "show";
});
