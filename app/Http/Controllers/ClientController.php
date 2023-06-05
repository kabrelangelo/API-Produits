<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Client::where('email', $credentials['email'])->first() && Client::where('email', $credentials['email'])->first()->verifyPassword($credentials['password'])) {
            $client = Client::where('email', $credentials['email'])->first();
            $token = $client->createToken('ApiProduits')->accessToken;
            return response()->json(['token' => $token], 200)->withCookie(cookie('token', $token, 60));
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    // public function inscription(Request $request)
    // {
    //     $request->validate([
    //         'nom' => 'required',
    //         'prenom' => 'required',
    //         'email' => 'required|email|unique:clients,email',
    //         'password' => 'required|min:8',
    //     ]);

    //     $nom = $request->nom;
    //     $prenom = $request->prenom;
    //     $email = $request->email;
    //     $password = Hash::make($request->password);

    //     $client = new Client();
    //     $client->nom = $nom;
    //     $client->prenom = $prenom;
    //     $client->email = $email;
    //     $client->password = $password;
    //     $client->save();

    //     return response()->json([
    //         $client,
    //         "success" => true,
    //         "message" => "Client créé avec succès"
    //     ]);
    // }

    // public function authentifierClient(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);
    //     $credentials = $request->only('email', 'password');
    //     if (Auth::guard('clients')->attempt($credentials)) {
    //         $client = Auth::guard('clients')->user();
    //         return response()->json([
    //             $client,
    //             "success" => true,
    //             "message" => "Connexion réussie"
    //         ]);
    //     } else {
    //         return response()->json([
    //             "success" => false,
    //             "message" => "Identifiants invalides"
    //         ]);
    //     }
    // }
}
