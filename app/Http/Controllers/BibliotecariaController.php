<?php

// app/Http/Controllers/BibliotecariaController.php
namespace App\Http\Controllers;

use App\Models\Bibliotecaria;
use Illuminate\Http\Request;

class BibliotecariaController extends Controller
{
    public function index()
    {
        $bibliotecarias = Bibliotecaria::all();
        return response()->json($bibliotecarias);
    }

    public function show(Bibliotecaria $bibliotecaria)
    {
        return response()->json($bibliotecaria);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
        ]);

        $bibliotecaria = Bibliotecaria::create($request->all());

        return response()->json($bibliotecaria, 201);
    }

    public function update(Request $request, Bibliotecaria $bibliotecaria)
    {
        $request->validate([
            'nome' => 'required|string',
        ]);

        $bibliotecaria->update($request->all());

        return response()->json($bibliotecaria, 200);
    }

    public function destroy(Bibliotecaria $bibliotecaria)
    {
        $bibliotecaria->delete();

        return response()->json(null, 204);
    }
}
