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
        
        $albuns = Album::paginate(10);
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
        $regras = [
            "nome" => "required |min:3 |max:40",
            "ano" => " required |min:4 |max:4",
        ];

        $feedback = [
            "required" => "O campo :attribute precisa ser preenchido",

            "nome.min" => "O campo Nome precisa ter no mínimo 3 caracteres",
            'nome.max' => "O campo Nome deve ter no máximo 40 caracteres",

            

            "ano.min" => "O campo Ano está incorreto, Necessário colocar 4 números!",
            "ano.max" => "O campo Ano está incorreto, Necessário colocar 4 números!"
            
           
            
        ];
        
         

        $request->validate($regras, $feedback);
        Album::create($request->all());
        return redirect()->route("album.create")->with('success', 'Album cadastrado com sucesso!');
    
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
        $album->delete();
        return redirect()->route("album.index")->with('success', 'Album excluído com sucesso!');
    }
}
