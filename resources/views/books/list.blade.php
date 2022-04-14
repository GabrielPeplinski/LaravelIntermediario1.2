@extends('layouts.app')

@section('content')
<h3>Livros Que Cadastrados:</h3>

@if (count($books) === 0)
<div class="alert alert-danger" role="alert">
    <p>Não há livros cadastrados!</p>
</div>
@else
@foreach($books as $book)
<div class="container">
    <table class="table  col-md-8 col-sm-8 col-xs-11">
        <thead>
            <tr>
                <th class="col-md-2.4 col-sm-2.4 col-xs-1.2">Título</th>
                <th class="col-md-2.4 col-sm-2.4 col-xs-1.2">Autor</th>
                <th class="col-md-2.4 col-sm-2.4 col-xs-1.2">Doador</th>
                <th class="col-md-2.4 col-sm-2.4 col-xs-1.2">Adicionado</th>
                <th class="col-md-2.4 col-sm-2.4 col-xs-0.8">Disponibilidade</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="col-md-2.4 col-sm-2.4 col-xs-1.2">{{ $book->title }}</td>
                <td class="col-md-2.4 col-sm-2.4 col-xs-1.2">{{ $book->author }}</td>
                <td class="col-md-2.4 col-sm-2.4 col-xs-1.2">{{ $book->donor }}</td>
                <td class="col-md-2.4 col-sm-2.4 col-xs-1.2">{{date( 'd/m/Y' ,strtotime($book->created_at))}}</td>

                @if ($book -> available === 0)
                <td class="col-md-2.4 col-sm-2.4 col-xs-0.8">Emprestado!</td>
                @else
                <td class="col-md-2.4 col-sm-2.4 col-xs-0.8">Disponível</td>
                @endif

                <td class="col-md-2.4 col-sm-1.5 col-xs-2">
                    <form action="/books/show/{{ $book->id }}" method="GET">
                        <button type="submit" class="btn-sm btn-success text-dark"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 
                                        0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

</div>

@endforeach
@endif

@endsection