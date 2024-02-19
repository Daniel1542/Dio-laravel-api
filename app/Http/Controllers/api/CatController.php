<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return Cat::all();
        } catch (\Exception $e) {
            return response()->json(['Erro ao mostrar gatos.' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $request->validate([
                'nome' => 'required|string',
                'raca' => 'required|string',
                'idade' => 'required|integer',
            ]);

            $gatos = new Cat();

            $gatos-> nome = $request->nome;
            $gatos-> raca = $request->raca;
            $gatos-> idade = $request->idade;

            $gatos->save();

            return ( 'Cadastrado com sucesso.');
        } catch (\Exception $e) {
            return response()->json(['Erro ao cadastrar gato.' => $e->getMessage()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            return Cat::findOrFail($id);
        } catch (\Exception $e) {
            return response()->json(['Erro ao mostar gato.' => $e->getMessage()], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $gatos = Cat::findOrFail($id);

            $request->validate([
                'nome' => 'required|string',
                'raca' => 'required|string',
                'idade' => 'required|integer',

            ]);

            $gatos-> nome = $request->nome;
            $gatos-> raca = $request->raca;
            $gatos-> idade = $request->idade;


            $gatos->update();

            return ('Gato atualizado com sucesso.');
        } catch (\Exception $e) {
            return response()->json(['Erro ao atualizar o gato.' => $e->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $Ativos = Cat::findOrFail($id);
            $Ativos-> delete();
        } catch (\Exception $e) {
            return response()->json(['Erro ao deletar gato.' => $e->getMessage()], 404);
        }
    }
}
