<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Bibliotecaria;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::all();
        return response()->json($livros);
    }

    public function show(Livro $livro)
    {
        return response()->json($livro);
    }

    // app/Http/Controllers/LivroController.php
    public function alugarLivro(Request $request)
    {
        $request->validate([
            'livro_id' => 'required|exists:livros,id',
            'bibliotecaria_id' => 'required|exists:bibliotecarias,id',
        ]);

        $livro = Livro::findOrFail($request->input('livro_id'));
        $bibliotecaria = Bibliotecaria::findOrFail($request->input('bibliotecaria_id'));

        // Verifica se o livro está disponível para aluguel
        if (!$livro->disponivel) {
            return response()->json(['error' => 'Livro não está disponível para aluguel.'], 400);
        }

        // Atualiza o livro com a bibliotecária associada e marca como não disponível
        $livro->update([
            'bibliotecaria_id' => $bibliotecaria->id,
            'disponivel' => false,
        ]);

        return response()->json(['message' => 'Livro alugado com sucesso.']);
    }


    public function update(Request $request, Livro $livro)
    {
        $request->validate([
            'titulo' => 'required|string',
            'autor' => 'required|string',
            'disponivel' => 'boolean',
        ]);

        $livro->update($request->all());

        return response()->json($livro, 200);
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();

        return response()->json(null, 204);
    }
}
