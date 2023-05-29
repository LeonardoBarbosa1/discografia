@extends('layouts.app')

@section("titulo","Album")
@section('conteudo')

    <div class="menu">

        <li class="nav-item active btn btn-secondary btn-lg btn-dark text-right mt-5 ">
            <a class="nav-link" href="{{ route('album.create') }}">Cadastrar Novo Álbum</a>
        </li>
        
    </div>            

    {{-- MENSAGEM DE ÁLBUM EXCLUIDO COM SUCESSO --}}
    <div class="container mt-5">

        <div class="row d-flex justify-content-center align-items-center ">
            <div class="col-6">

                <div class=" bg-opacity-50  align-items-center">

                    <div class="msg-fornecedor" id="mensagem-sucesso"> 
                        @if (session('success'))
                        <div class="alert alert-danger">
                            {{ session('success') }}
                        </div>
                        @endif
                    </div>
                    {{-- deixando mensagens por 5 segundos --}}
                    @push('scripts')
                    <script>
                        setTimeout(function() {
                            document.getElementById('mensagem-sucesso').style.opacity = '0';
                        }, 5000);

                    </script>
                    @endpush


                </div>
            </div>
        </div>
    </div>        
    
    <div class="container mt-5">

        <div class="row d-flex justify-content-center align-items-center ">
            <div class="col-6">


                <div class="bg-light p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <img src="{{ asset('img/logo.png') }}">
                    </div>
                    <div class="h1 text-right">Discografia</div>
                </div>

                
    
                {{-- VERIFICANDO SE TEM REGISTROS EM $albuns--}}
                @if($albuns->isEmpty()){{--  SE NÃO TIVER REGISTROS --}}
                   {{-- Verificando se é uma pesquisa --}}
                        @if(Route::currentRouteName() == "album-pesquisa")  
                            {{-- Se for... Pesquisa não encontrada --}}
                            <div class="bg-light p-3 ">
                                <form action="{{ route('album-pesquisa') }}" method="post">
                                    @csrf
                                    <p class="palavra-chave">Dígite uma palavra chave </p>
                                    <div class="d-flex">
                                        <input class="barra-album-faixa" type="search" name="termo_pesquisa" placeholder="Digite sua pesquisa" aria-label="Pesquisar">
                                        <button class="btn-rounded" type="submit">Pesquisar</button>
                                    </div>
                                </form>
                                <h2 class=" mt-4 text-danger ">Pesquisa não encontrada</h2>
                                <li class="nav-item active btn btn-secondary btn-lg btn-dark text-right p-1 mt-2 ">
                                    <a class="nav-link" href="{{ route('album.index') }}">Voltar</a>
                                </li>
                             </div> 
                             
                        @else   
                            {{--  SE NÃO TIVER REGISTROS --}}
                            <div class="bg-light bg-opacity-75 p-5 ">
                                <h2 class=" text-danger mt-4">Ainda não tem álbuns cadastradas</h2>
                                <li class="nav-item active btn btn-success btn-lg text-right mt-5">
                                    <a class="nav-link" href="{{ route('album.create') }}">Clique aqui para cadastrar</a>
                                </li>
                            </div>    
                         @endif     
                @else   
                    @if($albuns->isEmpty())
                    {{-- Tirando barra de pesquisa caso não tenha registros--}}
                    @else
                        <div class="bg-light p-3" >
                            <form action="{{ route('album-pesquisa') }}" method="post">
                                @csrf
                                <p class="palavra-chave">Dígite uma palavra chave </p>
                                <div class="d-flex">
                                    <input class="barra-album-faixa" type="search" name="termo_pesquisa" placeholder="Digite sua pesquisa" aria-label="Pesquisar">
                                    <button class="btn-rounded" type="submit">Pesquisar</button>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{--  SE TIVER REGISTROS --}}  
                    <table  class=" bg-light table table-striped table-bordered mb-3">
       
                        <thead>
                            <tr>
                                <th class="h3" scope="col">Nome</th>
                                <th class="h3" scope="col">Ano</th>
                                <th class="h3" scope="col">Excluir</th>
                            </tr>
                        </thead>
            
                        <tbody>
                            @foreach ($albuns as $album )
                            <tr>
                                <td> {{$album->nome}}</td>
                                <td> {{$album->ano}}</td>
                                <td>
                                    <form method="post" action="{{ route("album.destroy", ["album" => $album->id])}}">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                 @endif    
        
            </div>
            @if($albuns->isEmpty())
                {{--SE NÃO TIVER REGISTRO NÃO APARECER A EXIBIÇÃO DA QUANTIDADE --}}
            @else
                {{-- SE TIVER REGISTRO... APARECER A QUANTIDADE POR PÁGINA E TOTAL --}}
                <div class="d-flex justify-content-center align-items-center ">
                    {{ $albuns->appends($request)->links()}}  
                    <br>
                </div>
                <div class="bg-light p-2 d-flex justify-content-center mt-2 bg-light h5" 
                    style=" width: 48%;">
                            
                    Exibindo {{ $albuns->count()}} 
                    {{--Verificado se a quantidade para definir se mostra no singular ou não --}}
                    @if($albuns->count() == 1) 
                        Álbum
                    @else 
                        Álbuns
                    @endif        
                    de {{ $albuns->total()}} 
                    (de {{ $albuns->firstItem()}} a 
                    {{ $albuns->lastItem()}})
                </div>
            @endif    
        <div>    
    </div>
   
              
    
                
     


@endsection