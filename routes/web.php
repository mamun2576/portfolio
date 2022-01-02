<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AboutPagesController;

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

//Route::get('/', function () {
  //  return view('welcome');
//});
Route::get('/', 'pagesController@index')->name('home');

Route::prefix('admin')->group(function(){
    Route::get('/dashboard', 'pagesController@dashboard')->name('admin.dashboard');
    Route::get('/main', 'MainPagesController@index')->name('admin.main');
    Route::put('/main', 'MainPagesController@update')->name('admin.main.update');
    Route::get('/services/create', 'servicePagesController@create')->name('admin.services.create');
    Route::post('/services/create', 'servicePagesController@store')->name('admin.services.store');
    Route::get('/services/list', 'servicePagesController@list')->name('admin.services.list');
    Route::get('/services/edit/{id}', 'servicePagesController@edit')->name('admin.services.edit');
    Route::post('/services/update/{id}', 'servicePagesController@update')->name('admin.services.update');
    Route::delete('/services/destroy/{id}', 'servicePagesController@destroy')->name('admin.services.destroy');

    Route::get('/portfolios/create', 'portfolioPagesController@create')->name('admin.portfolios.create');
    Route::put('/portfolios/create', 'portfolioPagesController@store')->name('admin.portfolios.store');
    Route::get('/portfolios/list', 'portfolioPagesController@list')->name('admin.portfolios.list');
    Route::get('/portfolios/edit/{id}', 'portfolioPagesController@edit')->name('admin.portfolios.edit');
    Route::post('/portfolios/update/{id}', 'portfolioPagesController@update')->name('admin.portfolios.update');
    Route::delete('/portfolios/destroy/{id}', 'portfolioPagesController@destroy')->name('admin.portfolios.destroy');

    Route::get('/abouts/create', [AboutPagesController::class,'create'])->name('admin.abouts.create');
    Route::put('/abouts/create', [AboutPagesController::class,'store'])->name('admin.abouts.store');
    Route::get('/abouts/list', [AboutPagesController::class,'list'])->name('admin.abouts.list');
    Route::get('/abouts/edit/{id}', [AboutPagesController::class,'edit'])->name('admin.abouts.edit');
    Route::post('/abouts/update/{id}', [AboutPagesController::class,'update'])->name('admin.abouts.update');
    Route::delete('/abouts/destroy/{id}', [AboutPagesController::class,'destroy'])->name('admin.abouts.destroy');
});

Route::post('/contact', 'ContactFormController@store')->name('contact.store');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
