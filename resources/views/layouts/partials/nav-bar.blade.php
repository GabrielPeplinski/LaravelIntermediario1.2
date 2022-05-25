<nav class="navbar navbar-expand-lg navbar-light bg-primary p-2">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @auth
                <li class="nav-item active">
                    <a class="nav-link" href={{ route('welcome') }}>Início</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href={{ route('books.create') }}>Cadastrar Livro</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href={{ route('books.index') }}>Ver Livros</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href={{ route('borrows.index') }}>Meus Empréstimos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/report">Relatório</a>
                </li>
                <li class="nav-item active">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a href={{ route('logout') }} class="nav-link" onclick="event.preventDefault();
                    this.closest('form').submit();">
                            Sair
                        </a>
                    </form>
                </li>
            @endauth
            @guest
                <li class="nav-item active">
                    <a class="nav-link" href={{ route('login') }}>Entrar</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href={{ route('register') }}>Registrar Usuário</a>
                </li>
            @endguest
        </ul>
    </div>
</nav>
