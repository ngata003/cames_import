<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('authentification.inscription');
});

Route::get('/connexion', function () {
    return view('authentification.connexion');
});

Route::get('/accueil', function () {
    return view('accueil');
});

Route::get('/', function () {
    return view('authentification.inscription');
});
Route::get('/reset_password',function(){
    return view('authentification.reset_password');
});

Route::get('/forget_password',function(){
    return view('authentification.forget_password');
});

Route::get('/ajout_commandes', function(){
    return view('commandes.add_commandes');
});

Route::get('/gestionnaires',function(){
    return view('gestionnaires.gestionnaires');
});

Route::get('/agences',function(){
    return view('agences.agence');
});

Route::get('/retraits',function(){
    return view('retraits');
});
Route::get('/depot_colis',function(){
    return view('agences.depot_colis');
});
Route::get('/command_enregistrees',function(){
    return view('commandes.rap_commandes');
});

Route::post('/add_inscriptions',[UserController::class,'inscription_code']);
Route::post('/add_connexion',[UserController::class,'add_connexion']);
