
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
            
            <a class="logo-img" href="{{ route('home') }}" >
                <img  src="{{ asset('img/logo.png') }}" >
            </a>    

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active h4">
                    <a class="nav-link " href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item h4">
                    <a class="nav-link " href="{{ route('album.index') }}">Álbum</a>
                </li>
                <li class="nav-item h4">
                    <a class="nav-link " href="{{ route('faixa.index') }}">Faixas</a>
                </li>
                
                </ul>
            </div>
</nav>

