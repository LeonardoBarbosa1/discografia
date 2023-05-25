<?php

namespace App\Http\Controllers;
use App\Models\Album;
use App\Models\Faixa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $albuns = Album::paginate(3);
        $faixas = Faixa::whereIn("album_id", $albuns->pluck('id'))->get();
        
        
        return view('home',  ["albuns" => $albuns, "faixas" => $faixas, "request" => $request->all()]);
        
        
    }
}
