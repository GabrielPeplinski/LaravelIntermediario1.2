@extends('layouts.app')

@section('content')

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
            <form action="/books/show/{{ $book->id }}" method="GET">
                <button type="submit" class="card-link bg-secondary">Ver mais</button>
            </form>
        </div>
    </div>
    @endforeach
@endif

@endsection