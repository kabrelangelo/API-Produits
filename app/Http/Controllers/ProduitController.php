<?php

namespace App\Http\Controllers;

use App\Models\Produit;
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
}