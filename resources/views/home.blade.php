@extends('layouts.app')

@section("titulo","Home")

@section('conteudo')




    {{-- MENSAGEM DE URL NÃO ENCONTRADA --}}
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
    <div class="container principal-custom">
        <div class="row d-flex justify-content-center align-items-center ">
            <div class="col-6">


                <div class="bg-light p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <img src="{{ asset('img/logo.png') }}">
                    </div>
                    <div class="h1 text-right">Discografia</div>
                </div>

                <div class="bg-light bg-opacity-75 p-5 ">


                    @if($albuns->isEmpty())
                    {{-- --}}
                    @else
                        <div>
                            <form action="{{ route('home.pesquisa') }}" method="post" class="d-flex">
                                @csrf
                                <div class="input-group">
                                    <input class="form-control rounded" type="search" name="termo_pesquisa" placeholder="Digite sua pesquisa" aria-label="Pesquisar">
                                    <button href="{{ route('album.create') }}" class="btn btn-primary btn-custom" type="submit">Pesquisar</button>
                                </div>
                            </form>
                        </div>
                    @endif
                    {{-- VERIFICANDO SE TEM REGISTROS EM $albuns--}}
                    @if($albuns->isEmpty())
                        {{--  SE NÃO TIVER REGISTROS --}}

                        @if(Route::currentRouteName() == "home.pesquisa")  
                            <div>
                                <form action="{{ route('home.pesquisa') }}" method="post" class="d-flex">
                                    @csrf
                                    <div class="input-group">
                                        <input class="form-control rounded" type="search" name="termo_pesquisa" placeholder="Digite sua pesquisa" aria-label="Pesquisar">
                                        <button href="{{ route('album.create') }}" class="btn btn-primary btn-custom" type="submit">Pesquisar</button>
                                    </div>
                                </form>
                            </div>  
                            <h2 class=" text-danger mt-4">Pesquisa não encontrada</h2>
                              
                        @else   
                            <h2 class=" text-danger mt-4">Ainda não tem álbuns cadastrados</h2>
                            <li class="nav-item active btn btn-success btn-lg text-right mt-5">
                                <a class="nav-link" href="{{ route('album.create') }}">Clique aqui para cadastrar</a>
                            </li>
                         @endif   
                    
                    @else 

                       <table class="table table-borderless mb-3">
                            <tbody>
                                @foreach ($albuns as $album)
                                    <tr>
                                        <th class="font-weight-bold">Álbum: {{$album->nome}}, {{$album->ano}}</th>
                                    </tr>
                                    {{-- Verificando se a variável $faixas está vazia ou se não há registros de faixas associadas ao $album->id --}}
                                    @if ($faixas->isEmpty() || !$faixas->where('album_id', $album->id)->count())
                                        <tr>
                                            <td class="text-danger mt-4" colspan="4">Não há faixas cadastradas em {{$album->nome}}</td>
                                             <td colspan="4">
                                                <li class="nav-item active btn btn-success text-right">
                                                    <a class="nav-link" href="{{ route('faixa.create') }}"> <i class="bi bi-plus">+</i></a>
                                                </li>
                                            </td>
                                        </tr>
                                        
                                    @else
                                        <tr>
                                           <th>
                                                <span style="margin-right: 30px;">Nº</span>
                                                <span>Faixa</span>
                                            </th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>Duração</th>
                                        </tr>
                                        @foreach ($faixas as $faixa)
                                            @if ($faixa->album_id == $album->id)
                                                <tr>
                                                    <td>
                                                        <span style="margin-right: 30px;">{{ $faixa->id }}</span>
                                                        <span>{{ $faixa->nome }}</span>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{ $faixa->duracao }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endif    
                </div>  
            </div>
            @if($albuns->isEmpty())
                    {{--SE NÃO TIVER REGISTRO NÃO APARECER A EXIBIÇÃO DA QUANTIDADE --}}
                @else
                    {{-- SE TIVER REGISTRO... APARECER A QUANTIDADE POR PÁGINA E TOTAL --}}
                    <div>
                        {{ $albuns->appends($request)->links()}}  
                        <br>
                    </div>
                    <div class="bg-light bg-opacity-75 p-2 d-flex justify-content-center mt-2 bg-light h5" style=" width: 48%;">
                                
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
        </div>
    </div>
@endsection

