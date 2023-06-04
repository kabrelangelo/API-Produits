<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\Produit;


class CommandeController extends Controller
{
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

    function commandesClient($idClient)
    {
        return response()->json(Commande::where('id_client', $idClient)->with('produit')->get());
    }


    function supprimerCommande($idCommande)
    {
        // Code permettant de supprimer une commande
        Commande::destroy($idCommande);
    }
}