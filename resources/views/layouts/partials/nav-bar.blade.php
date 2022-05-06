<nav class="navbar navbar-expand-lg navbar-light bg-primary p-2">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @auth
                <li class="nav-item active">
                    <a class="nav-link" href="/">Início</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/books/create">Cadastrar Livro</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/books/list">Ver Livros</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/books/borrows/list">Meus Empréstimos</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/books/borrows/report">Relatório</a>
                </li>
                <li class="nav-item active">
                    <form action="/logout" method="POST">
                        @csrf
                        <a href="/logout" class="nav-link" onclick="event.preventDefault();
                    this.closest('form').submit();">
                            Sair
                        </a>
                    </form>
                </li>
            @endauth
            @guest
                <li class="nav-item active">
                    <a class="nav-link" href="/login">Entrar</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/register">Registrar Usuário</a>
                </li>
            @endguest
        </ul>
    </div>
</nav>
