<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $albuns = Album::where("nome", "like", "%".$request->input("termo_pesquisa")."%")->paginate(20); // paginate(20) Colocando páginação de até 10 álbuns por tela

        return view("album.index", ["albuns" => $albuns, "request" => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        return view("album.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Colocando regras de validação para os campos
        $regras = [
            "nome" => "required |min:3 |max:40",
            "ano" => "required |min:4 |max:4",
        ];

        //mensagens de feedback para validações de formulário
        $feedback = [
            "required" => "O campo :attribute precisa ser preenchido!",

            "nome.min" => "O campo Nome precisa ter no mínimo 3 caracteres!",
            'nome.max' => "O campo Nome deve ter no máximo 40 caracteres!",

            "ano.min" => "O campo Ano está incorreto, Necessário colocar 4 números!",
            "ano.max" => "O campo Ano está incorreto, Necessário colocar 4 números!",
           
        ];

        //validar os dados recebidos de uma requisição HTTP
        $request->validate($regras, $feedback);
        Album::create($request->all());
        return redirect()->route("album.create")->with('success', 'Álbum cadastrado com sucesso!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        //deletando faixas que tem relação com $album
        $album->faixa()->delete();
        //deletando $album
        $album->delete();
        
        return redirect()->route("album.index")->with('success', 'Álbum excluído com sucesso!');
    }

    
    
}
