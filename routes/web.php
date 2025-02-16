<?php

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

Route::get('/commandes', function(){
    return view('commandes.add_commandes');
});

Route::get('/gestionnaires',function(){
    return view('gestionnaires.gestionnaires');
});
