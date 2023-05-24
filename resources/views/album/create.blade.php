@extends('layouts.app')

@section("titulo","Album")
@section('conteudo')

    <div class="menu">

        <li class="nav-item active btn btn-secondary btn-lg btn-dark text-right mt-5 ">
            <a class="nav-link px-5" href="{{ route('album.index') }}">Voltar</a>
        </li>
        
    </div> 
    <div class="container" > 

            <div class="row d-flex justify-content-center align-items-center " >
                <div class="col-6">
                    
                        <div class="bg-light bg-opacity-75 border rounded p-5 align-items-center" >

                        <div class="msg-fornecedor" id="mensagem-sucesso" >   {{-- Mensagem caso o cadastro seja realizado com sucesso --}}
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div> 
                        {{-- deixando mensagens por 4 segundos --}}
                            @push('scripts')
                                <script>
                                setTimeout(function() {
                                    document.getElementById('mensagem-sucesso').style.opacity = '0';
                                }, 6000);
                                </script>
                            @endpush 
                        <h1>Cadastrar Album: </h1>
                            <form  method="post" action="{{ route("album.store")}}">
                                @csrf
                                <div class="form">

                                                                   
                                <div class="form-group row mt-3 mr-5">
                                    <label class="">Nome</label>
                                    <div style="color:red;">    {{--has verifica se tem erros relacionado a nomes  --}}
                                        {{ $errors->has("nome") ? $errors->first("nome") : ""}}
                                    </div> 
                                    <div class="col-sm-10 mt-3">
                                    <input type="text" name="nome" class="form-control mx-auto" value="{{ old("nome") }}" placeholder="Nome" >
                                    </div>
                                </div>
                                    
                                    

                                        
                                <div class="form-group row mt-3">
                                    <label class="">Ano</label>
                                    <div style="color:red;">   {{-- has verifica se tem erros relacionado a site --}}
                                        {{ $errors->has("ano") ? $errors->first("ano") : ""}}
                                    </div> 
                                    <div class="col-sm-10 mt-3">
                                        <input type="text" class="form-control mx-auto" name="ano" value="{{ old("ano") }}" placeholder="Ano" >
                                    </div>
                                </div>    
                                    

                                <div class="form-group row">
                                    <div class="col-sm-10 mt-5 ">
                                        <button type="submit" class="button-add btn px-5  btn-success">Cadastra</button>
                                    </div>
                                </div>
                                </div>

                            </form>
                            
                        </div>
                            
                </div>
                            
            </div>
        </div>

           
        
    

@endsection    