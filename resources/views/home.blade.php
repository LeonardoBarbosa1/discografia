@extends('layouts.app')

@section("titulo","Home")
@section('conteudo')


    <div class="menu">

        <li class="nav-item active btn btn-secondary btn-lg btn-dark text-right mt-5 ">
            <a class="nav-link" href="{{ route('album.create') }}">Cadastrar Álbum</a>
        </li>
        
    </div>             
     
    <div class="container" > 

            <div class="row d-flex justify-content-center align-items-center " >
                <div class="col-6">
                    
                        <div class="bg-light bg-opacity-75 rounded p-5 align-items-center" >
                            <table class="table table-borderless  mb-3">
                            <thead>
                                <tr>
                                
                                    <th scope="col"><img  src="{{ asset('img/logo.png') }}" > </th>
                                    <th class="h1 col-3" scope="col"> Discografia</th>
                                    
                                </tr>
                                
                            </thead>
                            
                            <tbody >
                                @foreach ($albuns as $album )
                                    <tr >
                                        <th > Álbum: {{$album->nome}} , {{$album->ano}}</th>
                                    </tr>
                                    <tr >
                                        <th> Nº</th>
                                        <th> Faixa</th>
                                        <th> Duração</th>
                                    </tr>
                                    @foreach ($faixas as $faixa )
                                        <tr>
                                        @if ($faixa->album_id == $album->id)
                                            <td> {{$faixa->id}}</td>
                                            <td> {{$faixa->nome}}</td>
                                            <td> {{$faixa->duracao}}</td>
                                        @endif
                                            
                                            
                                        </tr>
                                    @endforeach
                                    
                                @endforeach
                            </tbody>
                        
                            </table>
                        </div> 
                        <div class="d-flex justify-content-center mt-4">
                                {{ $albuns->appends($request)->links()}}  
                        <br>
                        </div>
                        <div class="d-flex justify-content-center mt-4 bg-light h5" style="width: 50%; margin-left: auto;margin-right: auto; background-color: #e9e9e9;  margin-top: 100px;">
                            Exibindo {{ $albuns->count()}} Álbuns de {{ $albuns->total()}} (de {{ $albuns->firstItem()}} a {{ $albuns->lastItem()}})
                        </div>
                        
        </div>
                            
                </div>
                            
            </div>
        </div>        
        
                    
        


    @endsection
