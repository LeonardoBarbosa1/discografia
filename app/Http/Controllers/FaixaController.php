<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Faixa;
use Illuminate\Http\Request;

class FaixaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Colocando páginação de até 10 álbuns por tela
        $faixas = Faixa::paginate(10);
        return view("faixa.index", ["faixas" => $faixas, "request" => $faixas->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $albuns = Album::all();
        return view("faixa.create", ["albuns" => $albuns]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Colocando regras de validação para os campos
        $regras = [
            "nome" => "required |min:3 |max:40",
            "duracao" => " required |min:2 |max:8 ",
            "album_id" => "exists:albuns,id"
            
        ];
        //mensagens de feedback para validações de formulário
        $feedback = [
            "required" => "O campo :attribute precisa ser preenchido",

            "nome.min" => "O campo Nome precisa ter no mínimo 3 caracteres",
            'nome.max' => "O campo Nome deve ter no máximo 40 caracteres",

            

            "duracao.min" => "O campo duracao está incorreto!",
            "duracao.max" => "O campo duracao está incorreto!",

            "album_id.exists" => "o Álbum informado não é válido"
            
            
           
            
        ];
        //validar os dados recebidos de uma requisição HTTP
        $request->validate($regras, $feedback);
        Faixa::create($request->all());
        return redirect()->route("faixa.create")->with('success', 'Faixa cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faixa $faixa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faixa $faixa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faixa $faixa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faixa $faixa)
    {
        //Deletando Faixa
        $faixa->delete();
        return redirect()->route("faixa.index")->with('success', 'Faixa excluída com sucesso!');
    }

   
}
