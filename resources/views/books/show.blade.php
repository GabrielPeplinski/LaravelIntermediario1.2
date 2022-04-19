@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table col-md-8 col-sm-8 col-xs-10">
        <thead>
            <tr>
                <th class="col-md-2 col-sm-2 col-xs-2">Título:</th>
                <th class="col-md-2 col-sm-2 col-xs-1.5">Autor</th>
                <th class="col-md-2 col-sm-0.8 col-xs-0.8">Doador</th>
                <th class="col-md-2 col-sm-2 col-xs-2">Adicionado</th>
                <th class="col-md-2 col-sm-2 col-xs-1">Situação</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="col-md-2 col-sm-2 col-xs-2">{{ $book->title }}</td>
                <td class="col-md-2 col-sm-2 col-xs-1">{{ $book->author }}</td>
                <td class="col-md-2 col-sm-0.5 col-xs-0.5">{{ $book->donor }}</td>
                <td class="col-md-2 col-sm-2 col-xs-2">{{date( 'd/m/Y' ,strtotime($book->created_at))}}</td>

                @if ($book -> available === 0)
                <td class="col-md-2 col-sm-2 col-xs-1">Emprestado!</td>
                @else
                <td class="col-md-2 col-sm-2 col-xs-1">Disponível</td>
                @endif
            </tr>
            <tr>
                <td class="col-xg-2 col-lg-2 col-md-3 col-sm-3 col-xs-4">
                    <div>
                        <form action="/books/edit/{{ $book->id }}" method="POST">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn-sm btn-secondary text-dark">Editar</button>
                        </form>
                    </div>
                </td>
                <td class="col-xg-2 col-lg-2 col-md-3 col-sm-3 col-xs-4">
                    <div>
                        <form action="/books/delete/{{ $book->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sm btn-danger text-dark">Deletar</button>
                        </form>
                    </div>
                </td>
                <td class="col-xg-2 col-lg-2 col-md-3 col-sm-3 col-xs-4">
                    <div>
                        @if ($book -> available === 1)
                        <form action="/books/borrow/{{ $book->id }}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn-sm btn-success text-dark">Emprestar</button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
