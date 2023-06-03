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

    function ajouterCommande(Request $request)
    {
        $idClient = $request->id_client; // Récupération de l'ID du client depuis la requête
        $idProduit = $request->id_produit; // Récupération de l'ID du produit depuis la requête
        $quantite = $request->quantite; // Récupération de la quantité depuis la requête
        $date = $request->date; // Récupération de la date depuis la requête
        // Code permettant de créer une commande
        $commande = new Commande(); // Création d'une nouvelle commande
        $commande->id_client = $idClient; // Attribution de l'ID du client à la commande
        $commande->id_produit = $idProduit; // Attribution de l'ID du produit à la commande
        $commande->quantite = $quantite; // Attribution de la quantité à la commande
        $commande->date = $date; // Attribution de la date à la commande
        $commande->save(); // Sauvegarde de la commande dans la base de données
        return response()->json([
            $commande,
            'success' => true,
            'message' => 'Commande créée avec succès'
        ]); // Retourne une réponse JSON indiquant que la commande a été créée avec succès
    }
}