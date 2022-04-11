@extends('layouts.app')

@section('content')

<div class="card bg-primary mb-3" style="width: 20rem;">
    <div class="card-body">
        <h5 class="card-title text-dark">{{ $book->title }}</h5>
        <br>
        <h6 class="card-subtitle mb-2 text-dark">Autor : {{ $book->author }}</h6>
        <h6 class="card-subtitle mb-2 text-dark">Doado por : {{ $book->donor }}</h6>
        <h6 class="card-subtitle mb-2 text-dark">Adicionado no dia : {{date( 'd/m/Y' , 
            strtotime($book->created_at))}}
        </h6>
        <form action="/books/edit/{{ $book->id }}" method="POST">
            @csrf
            @method('GET')
            <button type="submit" class="card-link bg-secondary">Editar</button>
        </form>
        <form action="/books/delete/{{ $book->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="card-link bg-danger">Deletar</button>
        </form>
    </div>
</div>

@endsection