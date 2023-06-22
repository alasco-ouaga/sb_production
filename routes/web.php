<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\HomeController;

use Svg\Tag\Group;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;

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



Auth::routes();
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    
    //route accessible par l'administrateur
    Route::middleware('adminRouteProtected')->group(function(){

    });

    //route accessible par le gestionaire
    Route::middleware('gestionnaireRouteProtected')->group(function () {

    });

    //route accessible par le secretaire
    Route::middleware('secretaireRouteProtected')->group(function () {

    });
});
