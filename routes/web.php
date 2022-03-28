<?php

use App\Http\Controllers\TestController;
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
    return view('welcome');
});

// Route::any('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [TestController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::post('/dashboard', [TestController::class, 'store'])->middleware(['auth'])->name('dashboard.store');

require __DIR__.'/auth.php';


Route::get('/test', [TestController::class, 'index']);