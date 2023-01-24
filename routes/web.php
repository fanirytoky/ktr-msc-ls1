<?php

use App\Http\Controllers\Controller;
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

Route::get('/dashboard', function () {
    return view('Acceuil');
})->middleware(['auth'])->name('dashboard');

Route::get('/create.card',[Controller::class,'createCard'])->middleware(['auth'])->name('card.Create');
Route::post('/store-card',[Controller::class,'storeCard'])->middleware(['auth'])->name('card.Store');
Route::get('/list.card',[Controller::class,'getAllCardsById'])->middleware(['auth'])->name('card.list');


require __DIR__.'/auth.php';
