<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProduitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/produits', [ProduitController::class, 'liste']);
Route::get('/produits/{id}', [ProduitController::class, 'show']);
Route::post('/produits', [ProduitController::class, 'ajouter']);


// Route::post('/commandes', [ProduitController::class, 'ajouterCommande']);
Route::post('/commandes', [CommandeController::class, 'ajouterCommande']);
Route::get('/commandes/{idClient}', [CommandeController::class, 'commandesClient']);
Route::delete('/commandes/{idCommande}', [CommandeController::class, 'supprimerCommande']);


//Route::post('/inscription', [ClientController::class, 'inscription']);
// Route::post('/client/authentification', [ClientController::class, 'authentifierClient'])
//     ->middleware('auth:clients');
Route::post('/client', [ClientController::class, 'creerClient']);
Route::post('/client/login', [ClientController::class, 'login']);
