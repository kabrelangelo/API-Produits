<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function creerClient(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:clients,email',
            'password' => 'required|min:8',
        ]);

        $nom = $request->nom;
        $prenom = $request->prenom;
        $email = $request->email;
        $password = Hash::make($request->password);

        $client = new Client();
        $client->nom = $nom;
        $client->prenom = $prenom;
        $client->email = $email;
        $client->password = $password;
        $client->save();
        return response()->json([
            $client,
            "sucess" => true,
            "message" => "Client créée avec succès"
        ]);
    }
}