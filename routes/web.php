<?php

use App\Exports\DepotExport;
use App\Exports\FacturesExport;
use App\Exports\produitExport;
use App\Exports\UsersExport;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/', function () {return view('authentification.inscription');});
Route::get('/connexion', function () {return view('authentification.connexion');});
Route::get('/accueil', function () {return view('accueil');});
Route::get('/', function () { return view('authentification.inscription');});
Route::get('/reset_password',function(){return view('authentification.reset_password');});
Route::get('/forget_password',function(){return view('authentification.forget_password');});
Route::get('/ajout_commandes', function(){return view('commandes.add_commandes');});

Route::get('/gestionnaires', [UserController::class,'affichage_vue']);

Route::get('/agences',[AgenceController::class,'affichage_vue']);

Route::get('/retraits',function(){return view('retraits');});
//Route::get('/depot_colis',function(){return view('agences.depot_colis');});

Route::get('/depot_colis', [AgenceController::class,'deposer_colis']);
Route::get('/command_enregistrees',function(){return view('commandes.rap_commandes');});
Route::post('/add_entreprise',[EntrepriseController::class,'add_entreprise']);
Route::get('/entreprise', function (){return view('entreprise');});
Route::get('/entreprise_management',[EntrepriseController::class,'affichage_vue']);

Route::put('/entreprise_edit/{id}',[EntrepriseController::class,'update_entreprise']);


Route::post('/save_depot_colis',[AgenceController::class,'save_depot']);
// routes pour les utilisateurs
Route::get('/profil',function(){return view('profil');});
Route::put('profil_update',[UserController::class,'update_profil']);
Route::put('/gestionnaires_edit/{id}', [UserController::class,'update_gestionnaires']);
Route::delete('/gestionnaires_delete/{id}',[UserController::class,'delete_gestionnaires']);
Route::post('/add_gestionnaires',[UserController::class,'add_gestionnaires']);
Route::post('/add_inscriptions',[UserController::class,'inscription_code']);
Route::post('/add_connexion',[UserController::class,'add_connexion']);
Route::get('/research_gestionnaires',[UserController::class,'research_gestionnaires']);
Route::get('/gestionnaires_pdf',[pdfController::class,'generateGestionnairesPdf']);
// routes pour les agences
Route::post('/add_agences', [AgenceController::class,'add_agencies']);
Route::put('/agences_edit/{id}', [AgenceController::class, 'update_agence']);
Route::delete('/agences_delete/{id}',[AgenceController::class,'delete_agences']);
// Routes pour les commandes
Route::post('/save_commandes',[CommandeController::class,'save_commandes']);
Route::get('/command_enregistrees', [CommandeController::class,'affichage_view']);
Route::delete('/delete_commandes/{id}', [FactureController::class,'deleteCommandes']);
Route::get('/voir_commandes/{id}',[CommandeController::class,'voir_commandes']);
//Routes pour les factures
Route::get('/export_factures', function(){
    return Excel::download(new FacturesExport,'factures.xlsx');
});

Route::get('/factures_pdf',[pdfController::class,'generateFacturesPdf']);
Route::get('/imprimer_pdf/{id}', [pdfController::class,'imprimer_facture']);
Route::get('/research_factures',[FactureController::class,'research_factures']);
// Routes pour les produits

Route::get('/produits',[ProduitController::class,'product_view']);
Route::post('/add_produits',[produitController::class,'add_products']);
Route::put('/edit_produits/{id}',[produitController::class,'updateProduits']);
Route::delete('/delete_produits/{id}',[produitController::class,'deleteProduits']);
Route::get('/export_produits', function()  {return Excel::download(new produitExport, 'produits.xlsx');});
Route::get('/imprimer_pdf',[pdfController::class,'imprimer_rap_pdf']);
Route::get('/research_produits',[ProduitController::class,'research_products']);
// routes pour les depots

Route::get('/export_depots', function()  {return Excel::download(new DepotExport, 'depots.xlsx');});
Route::get('imprimer_rap-depots',[pdfController::class,'imprimer_depot_pdf']);

