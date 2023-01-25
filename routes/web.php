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
    return view('auth.login');
});

Route::get('/dashboard', [Controller::class,'getAllCardsById'])->middleware(['auth'])->name('dashboard');

Route::get('/create.card',[Controller::class,'createCard'])->middleware(['auth'])->name('card.Create');
Route::post('/store-card',[Controller::class,'storeCard'])->middleware(['auth'])->name('card.Store');
Route::get('/list.card',[Controller::class,'getAllCardsById'])->middleware(['auth'])->name('card.list');
Route::get('/getAllUsers',[Controller::class,'getAllUsers'])->middleware(['auth'])->name('user.list');
Route::get('/shareTo/{idUser}/{idCard}',[Controller::class,'shareTo'])->middleware(['auth'])->name('shareTo');
Route::get('/invitation.card',[Controller::class,'cardInvitation'])->middleware(['auth'])->name('card.Invitation');
Route::get('/add-Mycard',[Controller::class,'addToMyCard'])->middleware(['auth'])->name('addToMyCard');




require __DIR__.'/auth.php';
