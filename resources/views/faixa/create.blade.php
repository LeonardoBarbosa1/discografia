@extends('layouts.app')

@section("titulo","Criar Faixa")
@section('conteudo')

<div class="menu">

    <li class="nav-item active btn btn-secondary btn-lg btn-dark text-right mt-5 ">
        <a class="nav-link px-5" href="{{ route('faixa.index') }}">Voltar Faixas</a>
    </li>

</div>
<div class="container mt-4">

    <div class="row d-flex justify-content-center align-items-center ">
        <div class="col-6">

            <div class="bg-light bg-opacity-75 border rounded p-5 align-items-center">

                <div class="msg-fornecedor" id="mensagem-sucesso"> {{-- Mensagem caso o cadastro seja realizado com sucesso --}}
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
                    }, 5000);

                </script>
                @endpush
                <h1>Cadastrar Faixa: </h1>


                @if($albuns->isEmpty())
                    {{--  SE NÃO TIVER REGISTROS --}}
                        <h2 class=" text-danger mt-4">Só pode cadastrar uma faixa se estiver um álbum cadastrado</h2>
                        <li class="nav-item active btn btn-success btn-lg text-right mt-5">
                            <a class="nav-link" href="{{ route('album.create') }}">Clique aqui para cadastrar álbum</a>
                        </li> 
                @else 
                    <form method="post" action="{{ route("faixa.store")}}">
                        @csrf
                        <div class="form">

                            <div class="form-group row mt-3">
                                <label class="">Álbum</label>
                                <div style="color:red;">
                                    {{ $errors->has("album_id") ? $errors->first("album_id") : ""}}
                                </div>


                                {{-- VERIFICANDO SE TEM REGISTROS EM $faixas--}}
                    



                                <div class="col-sm-10 mt-3">
                                    <select class="form-select" name="album_id">
                                        <option> -- Selecione o Álbum </option>
                                        @foreach ($albuns as $album)
                                        <option value="{{$album->id}}" {{ old("album_id") == $album->id ? "selected" : ""}}> {{$album->nome}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-3 mr-5">
                                <label class="">Nome</label>
                                <div style="color:red;"> {{--has verifica se tem erros relacionado a nomes  --}}
                                    {{ $errors->has("nome") ? $errors->first("nome") : ""}}
                                </div>
                                <div class="col-sm-10 mt-3">
                                    <input type="text" name="nome" class="form-control mx-auto" value="{{ old("nome") }}" placeholder="Ex: Minas Gerais">
                                </div>
                            </div>




                            <div class="form-group row mt-3">
                                <label class="">Duração</label>
                                <div style="color:red;">
                                    {{ $errors->has("duracao") ? $errors->first("duracao") : ""}}
                                </div>
                                <div class="col-sm-10 mt-3">
                                    <input type="text" id="minutes-input" oninput="formatMinutes(this)" class="form-control mx-auto" name="duracao" value="{{ old("duracao") }}" placeholder="Ex: 03:47">

                                    <script>
                                        function formatMinutes(input) {
                                            // Remove qualquer caractere não numérico
                                            var value = input.value.replace(/\D/g, '');

                                            // Adiciona dois pontos (:) entre os dígitos
                                            if (value.length > 2) {
                                                value = value.substring(0, 2) + ':' + value.substring(2);

                                                // Verifica se há mais de dois dígitos após os dois pontos
                                                var minutesIndex = value.indexOf(':');
                                                var remainingChars = value.length - (minutesIndex + 1);
                                                if (remainingChars > 2) {
                                                    value = value.substring(0, minutesIndex + 3);
                                                }
                                            }

                                            // Atualiza o valor do campo
                                            input.value = value;
                                        }

                                    </script>
                                </div>
                            </div>

                            


                            <div class="form-group row">
                                <div class="col-sm-10 mt-5 ">
                                    <button type="submit" class="button-add btn px-5  btn-success">Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>





@endsection

