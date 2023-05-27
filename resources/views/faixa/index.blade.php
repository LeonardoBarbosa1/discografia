@extends('layouts.app')

@section("titulo","Faixa")
@section('conteudo')

    <div class="menu">
        <li class="nav-item active btn btn-secondary btn-lg btn-dark text-right mt-5 ">
            <a class="nav-link" href="{{ route('faixa.create') }}">Cadastrar Nova Faixa</a>
        </li>
    </div>            
        
    <div class="container mt-5">

        <div class="row d-flex justify-content-center align-items-center ">
            <div class="col-6">

                <div class=" bg-opacity-50  align-items-center">

                    <div class="msg-fornecedor" id="mensagem-sucesso"> {{-- Mensagem caso o cadastro seja realizado com sucesso --}}
                        @if (session('success'))
                        <div class="alert alert-danger">
                            {{ session('success') }}
                        </div>
                        @endif
                    </div>
                    {{-- deixando mensagens por 4 segundos --}}
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
        
    
                {{-- VERIFICANDO SE TEM REGISTROS EM $faixas--}}
                @if($faixas->isEmpty())
                    {{--  SE NÃO TIVER REGISTROS --}}
                    <div class="bg-light bg-opacity-75 p-5 ">
                        <h2 class=" text-danger mt-4">Ainda não tem faixas cadastradas</h2>
                        <li class="nav-item active btn btn-success btn-lg text-right mt-5">
                            <a class="nav-link" href="{{ route('faixa.create') }}">Clique aqui para cadastrar</a>
                        </li>
                    </div>    
                @else   
                    {{--  SE TIVER REGISTROS --}}  
                    <table class="bg-light table table-striped table-bordered mb-3">
                            <thead>
                                <tr>
                                    <th class="h3" scope="col">Nº</th>
                                    <th class="h3" scope="col">Nome</th>
                                    <th class="h3" scope="col">Duração</th>
                                    <th class="h3" scope="col">Álbum</th>
                                    <th class="h3" scope="col"> Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faixas as $faixa )
                                    <tr>
                                        <td> {{$faixa->id}}</td>
                                        <td> {{$faixa->nome}}</td>
                                        <td> {{$faixa->duracao}}</td>
                                        <td> {{$faixa->album->nome}}</td>
                                        <td> 
                                            <form method="post" action="{{ route("faixa.destroy", ["faixa" => $faixa->id])}}">
                                                @method("DELETE")
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Excluir</button>
                                                {{-- <a href=""> Deletar </a> --}}
                                            </form>    
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                @endif
            
                    
        
            </div>

            @if($faixas->isEmpty())
                {{--SE NÃO TIVER REGISTRO NÃO APARECER A EXIBIÇÃO DA QUANTIDADE --}}
            @else
                {{-- SE TIVER REGISTRO... APARECER A QUANTIDADE POR PÁGINA E TOTAL --}}
                <div class="d-flex justify-content-center align-items-center ">
                    {{ $faixas->appends($request)->links()}}  
                    <br>
                </div>
                <div class="bg-light p-2 d-flex justify-content-center mt-2 bg-light h5" style=" width: 48%;">
                            
                    Exibindo {{ $faixas->count()}} 
                    {{--Verificado se a quantidade para definir se mostra no singular ou não --}}
                    @if($faixas->count() == 1) 
                        Faixa
                    @else 
                        Faixas
                    @endif        
                    de {{ $faixas->total()}} 
                    (de {{ $faixas->firstItem()}} a 
                    {{ $faixas->lastItem()}})
                </div>
             @endif    
        <div>    
    </div>
    
@endsection    