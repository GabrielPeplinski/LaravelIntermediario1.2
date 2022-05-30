<h1>Notificação de Empréstimo</h1>

<br>

<h2>Olá, {{ $user->name ?? '' }}</h2>
<h2>Seu empréstimo foi realizado com sucesso!</h2>
<br>
<h2>Dados do Empréstimo:</h2>
<h3>Livro:{{ $book->title }}</h3>
<h3>Escrito por: {{ $book->author }}</h3>
<h3>Deve ser devolvido até o dia {{ $borrow->return_date }}</h3>
