@extends('layouts.app')

@section('content')
<h3>Livros Que Cadastrados:</h3>

@if (count($books) === 0) 
<div class="alert alert-danger" role="alert">
    <p>Não há livros cadastrados!</p>
</div>
@else 
    @foreach($books as $book) 
    <div class="card bg-primary mb-2" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title text-dark">{{ $book->title }}</h5>
            <br>
            <h6 class="card-subtitle mb-2 text-dark">Autor : {{ $book->author }}</h6>
            <h6 class="card-subtitle mb-2 text-dark">Doado por : {{ $book->donor }}</h6>

            @if ($book->available === 0)
            <h6 class="card-subtitle mb-2 text-dark">Status do Livro : <strong>Emprestado!</strong></h6>
            @else
            <h6 class="card-subtitle mb-2 text-dark">Status do Livro : <strong>Disponível!</strong></h6>
            @endif

            <form action="/books/show/{{ $book->id }}" method="GET">
                <button type="submit" class="btn btn-secondary text-dark">Ver mais</button>
            </form>
        </div>
    </div>
    @endforeach
@endif

@endsection