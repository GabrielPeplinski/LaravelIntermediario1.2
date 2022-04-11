<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <ul class="navbar-nav mr-auto">
        @auth
        <li class="nav-item active">
            <a class="nav-link text-dark" href="/">Início</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link text-dark" href="/books/create">Cadastrar Livro</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link text-dark" href="/books/list">Ver Livros</a>
        </li>
        <li class="nav-item active">
            @csrf
            <form action="{{ route('logout') }}" method="POST">
                <a class="nav-link text-dark" href="/logout">Sair</a>
            </form>
        </li>
        @endauth
        @guest
        <li class="nav-item active">
            <a class="nav-link text-dark" href="/login">Entrar</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link text-dark" href="/register">Registrar Usuário</a>
        </li>
        @endguest
    </ul>
</nav>