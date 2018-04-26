<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <div class="container">
    <a class="navbar-brand" href="#">
        <img src="{{ url('/img/logo-gsb.png') }}" height="40" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @auth
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('visiteur.rapports') }}">Comptes-Rendus</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('visiteur.visiteurs') }}">Visiteurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('visiteur.medecins') }}">Praticiens</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Medicaments</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {!! Auth::user()->firstname !!} {!! Auth::user()->lastname !!}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        {{ __('Déconnexion') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        @else
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
            </li>
        </ul>
        @endauth
    </div>
    </div>
</nav>