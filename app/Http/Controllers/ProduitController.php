<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produit;
use App\Models\Client;

use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function liste()
    {
        return response()->json(Produit::all());
    }

    public function show($id)
    {
        return response()->json(Produit::find($id));
    }

    public function ajouter(Request $request)
    {
        $produit = new Produit();
        $produit->nom = $request->nom;
        $produit->description = $request->description;
        $produit->lien_image = $request->lien_image;
        $produit->prix = $request->prix;
        $produit->tva = $request->tva;
        $produit->save();
        return response()->json($produit);
    }
}
