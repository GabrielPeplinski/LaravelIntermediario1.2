@extends('layouts.app')

@section('content')
<h3>Livros Que Você emprestou:</h3>

@if (count($myBorrows) === 0)
<div class="alert alert-danger" role="alert">
    <p>Você ainda não emprestou nenhum livro!</p>
</div>
@else
@for($i = 0; $i < count($myBorrows); $i++) 
<div class="card bg-primary mb-2" style="width: 18rem;">
    <div class="card-body">
        @if($myBorrows[$i]->book_id === $books[$i]->id)
        <h5 class="card-title text-dark">Título : {{ $books[$i]->title }}</h5>
        <br>
        <h6 class="card-subtitle mb-2 text-dark">Autor : {{ $books[$i]->author }}</h6>
        <h6 class="card-subtitle mb-2 text-dark">Data de Empréstimo : {{ $myBorrows[$i]->created_at }}</h6>
        <h6 class="card-subtitle mb-2 text-dark">Data da Devolução : {{ $myBorrows[$i]->return_date }}</h6>
        <form action="/" method="POST">
            @csrf
            @method('POST')
            <button type="submit" class="card-link bg-success">Prolongar Empréstimo</button>
        </form>
        <form action="/books/borrows/delete/{{ $books[$i]->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="card-link bg-danger">Devolver</button>
        </form>
    </div>
    @endif
    </div>
    @endfor

    @endif

    @endsection