@extends('layouts.app')

@section('content')

<div class="container">


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Título:</th>
                <th scope="col">Autor</th>
                <th scope="col">Doador</th>
                <th scope="col">Adicionado</th>
                <th scope="col">Disponibilidade</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->donor }}</td>
                <td>{{date( 'd/m/Y' ,strtotime($book->created_at))}}</td>

                @if ($book -> available === 0)
                <td>Emprestado!</td>
                @else
                <td>Disponível</td>
                @endif
            </tr>
        </tbody>
    </table>
    <!-- Arrumar div -->
    <div class="container">
        <form action="/books/edit/{{ $book->id }}" method="POST">
            @csrf
            @method('GET')
            <button type="submit" class="btn btn-secondary text-dark">Editar</button>
        </form>
        <form action="/books/delete/{{ $book->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger text-dark">Deletar</button>
        </form>

        @if ($book -> available === 1)
        <form action="/books/borrow/{{ $book->id }}" method="POST">
            @csrf
            @method('POST')
            <button type="submit" class="btn btn-success text-dark">Emprestar</button>
        </form>
        @endif
    </div>
</div>

<!--
<div class="card bg-primary mb-3" style="width: 20rem;">
    <div class="card-body">
        <h5 class="card-title text-dark">{{ $book->title }}</h5>
        <br>
        <h6 class="card-subtitle mb-2 text-dark">Autor : {{ $book->author }}</h6>
        <h6 class="card-subtitle mb-2 text-dark">Doado por : {{ $book->donor }}</h6>
        <h6 class="card-subtitle mb-2 text-dark">Adicionado no dia : {{date( 'd/m/Y' , 
            strtotime($book->created_at))}}
        </h6>

        @if ($book -> available === 0)
        <h6 class="card-subtitle mb-2 text-dark">Status do Livro : <strong>Emprestado!</strong></h6>
        @else
        <h6 class="card-subtitle mb-2 text-dark">Status do Livro : <strong>Disponível!</strong></h6>
        @endif

        <form action="/books/edit/{{ $book->id }}" method="POST">
            @csrf
            @method('GET')
            <button type="submit" class="btn btn-secondary text-dark">Editar</button>
        </form>
        <form action="/books/delete/{{ $book->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger text-dark">Deletar</button>
        </form>

        @if ($book -> available === 1)
        <form action="/books/borrow/{{ $book->id }}" method="POST">
            @csrf
            @method('POST')
            <button type="submit" class="btn btn-success text-dark">Emprestar</button>
        </form>
        @endif
    </div>
</div>
        -->

@endsection