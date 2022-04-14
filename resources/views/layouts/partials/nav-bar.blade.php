<nav>
    <div class="container-fluid justify-content-center">
        <div class="row bg-primary">
            @auth
            <div class="col-md-2 col-sm-4 col-xs-12">
                <a class="nav-link text-dark text-center" href="/">Início</a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-12">
                <a class="nav-link text-dark text-center" href="/books/create">Cadastrar Livro</a>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-12">
                <a class="nav-link text-dark text-center" href="/books/list">Ver Livros</a>
            </div>
            <div class="col-md-3 col-sm-7 col-xs-12">
                <a class="nav-link text-dark text-center" href="/books/borrows/list">Meus Empréstimos</a>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-12">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="nav-item">
                        <a class="nav-link text-dark text-center" href="{{ route('logout') }}" 
                        onclick="event.preventDefault();
                        this.closest('form').submit(); " role="button">

                            {{ __('Sair') }}
                        </a>
                    </div>
                </form>
            </div>
            @endauth
            @guest
            <div class="col-md-6 col-sm-4 col-xs-12">
                <a class="nav-link text-dark text-center" href="/login">Entrar</a>
            </div>
            <div class="col-md-6 col-sm-4 col-xs-12">
                <a class="nav-link text-dark text-center" href="/register">Registrar Usuário</a>
            </div>
            @endguest
        </div>
    </div>
</nav>