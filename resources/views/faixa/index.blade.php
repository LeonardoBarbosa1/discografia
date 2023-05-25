@extends('layouts.app')

@section("titulo","Faixa")
@section('conteudo')

    <div class="menu">

        <li class="nav-item active btn btn-secondary btn-lg btn-dark text-right mt-5 ">
            <a class="nav-link" href="{{ route('faixa.create') }}">Cadastrar Faixa</a>
        </li>
        
    </div>            
        
        <div class="container" > 

            <div class="row d-flex justify-content-center align-items-center " >
                <div class="col-6">
                    
                        <div class=" bg-opacity-50  align-items-center" >

                                <div class="msg-fornecedor" id="mensagem-sucesso" >   {{-- Mensagem caso o cadastro seja realizado com sucesso --}}
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
     
    <div class="d-flex justify-content-center" style="width: 50%; margin-left: auto;margin-right: auto; background-color: #e9e9e9;  margin-top: 100px;" >
     
      
        <table class="table table-striped table-bordered mb-3">
       
        <thead>
            <tr>
            
            <th class="h3" scope="col">Nº</th>
            <th class="h3" scope="col">Nome</th>
            <th class="h3" scope="col">Duração</th>
             <th class="h3" scope="col">Álbum</th>
            <th> </th>
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
        
    </div> 





    </div> 
    <div class="d-flex justify-content-center mt-4">
            {{ $faixas->appends($request)->links()}}  
    <br>
    </div>
    <div class="d-flex justify-content-center mt-4 bg-light h5" style="width: 50%; margin-left: auto;margin-right: auto; background-color: #e9e9e9;  margin-top: 100px;">
    Exibindo {{ $faixas->count()}} Faixas de {{ $faixas->total()}} (de {{ $faixas->firstItem()}} a {{ $faixas->lastItem()}})
    </div>


@endsection    