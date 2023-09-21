<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\TeamController;

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/myheroes/createhero',function(){
   return view('form');
});

// HEROES
Route::post('/myheroes/createhero',[HeroController::class,'store']);

// TEAMS
Route::get('/myheroes',[TeamController::class,'index']);
Route::get('/myheroes/createteam',[TeamController::class,'show']);


Route::post('/myheroes/createteam',[TeamController::class,'store']);

// TEST
Route::get('team/details/{id}',[TeamController::class,'details']);
