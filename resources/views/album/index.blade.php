@extends('layouts.app')

@section("titulo","Album")
@section('conteudo')

    <div class="menu">

        <li class="nav-item active btn btn-secondary btn-lg btn-dark text-right mt-5 ">
            <a class="nav-link" href="{{ route('album.create') }}">Cadastrar Album</a>
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
                                    }, 6000);
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
            
            <th scope="col">Nome</th>
            <th scope="col">Ano</th>
            <th> </th>
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
                            {{-- <a href=""> Deletar </a> --}}
                        </form>    
                    </td>

                    
                </tr>
            
            @endforeach
        </tbody>
        </table>
        
    </div> 
    <div class="d-flex justify-content-center mt-4">
            {{ $albuns->appends($request)->links()}}  
    <br>
    </div>
    <div class="d-flex justify-content-center mt-4 bg-light" style="width: 50%; margin-left: auto;margin-right: auto; background-color: #e9e9e9;  margin-top: 100px;">
    Exibindo {{ $albuns->count()}} Albuns de {{ $albuns->total()}} (de {{ $albuns->firstItem()}} a {{ $albuns->lastItem()}})
    </div>
              
    
                
     


@endsection