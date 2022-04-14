@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table  col-md-8 col-sm-8 col-xs-11">
        <thead>
            <tr>
                <th class="col-md-2.4 col-sm-2.4 col-xs-2">Título:</th>
                <th class="col-md-2.4 col-sm-2.4 col-xs-2">Autor</th>
                <th class="col-md-2.4 col-sm-1.5 col-xs-2">Doador</th>
                <th class="col-md-2.4 col-sm-2.4 col-xs-2">Adicionado</th>
                <th class="col-md-2.4 col-sm-2.4 col-xs-2">Disponibilidade</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="col-md-2.4 col-sm-2.4 col-xs-2">{{ $book->title }}</td>
                <td class="col-md-2.4 col-sm-2.4 col-xs-2">{{ $book->author }}</td>
                <td class="col-md-2.4 col-sm-2.4 col-xs-2">{{ $book->donor }}</td>
                <td class="col-md-2.4 col-sm-2.4 col-xs-2">{{date( 'd/m/Y' ,strtotime($book->created_at))}}</td>

                @if ($book -> available === 0)
                <td class="col-md-2.4 col-sm-2.4 col-xs-2">Emprestado!</td>
                @else
                <td class="col-md-2.4 col-sm-2.4 col-xs-2">Disponível</td>
                @endif
            </tr>
        </tbody>
    </table>
    <!-- Necessário corrigir dimensões para sm! -->
    <div class="row col-lg-4 col-md-5 col-sm-6 col-xs-11">
        <div class="container col-md-1 col-sm-4 col-xs-2 ">
            <form action="/books/edit/{{ $book->id }}" method="POST">
                @csrf
                @method('GET')
                <button type="submit" class="btn-sm btn-secondary text-dark">Editar</button>
            </form>
        </div>
        <div class="container col-md-1 col-sm-4 col-xs-2">
            <form action="/books/delete/{{ $book->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-sm btn-danger text-dark">Deletar</button>
            </form>
        </div>
        <div class="container col-md-1 col-sm-4 col-xs-2">
            @if ($book -> available === 1)
            <form action="/books/borrow/{{ $book->id }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="btn-sm btn-success text-dark">Emprestar</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
