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
            <a class="nav-link text-dark" href="/books/borrows/list">Meus Empréstimos</a>
        </li>
        <li class="nav-item active">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        this.closest('form').submit(); " role="button">

                        {{ __('Sair') }}
                    </a>
                </div>
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