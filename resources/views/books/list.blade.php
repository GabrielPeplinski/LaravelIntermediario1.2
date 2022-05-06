@extends('layouts.app')

@section('content')
    <h2>Livros Que Cadastrados:</h2>

    @if (count($books) === 0)
        <div class="alert alert-danger" role="alert">
            <p>Não há livros cadastrados!</p>
        </div>
    @else
        @foreach($books as $book)
            <div class="container">
                <table class="table table-striped col-md-8 col-sm-8 col-xs-10">
                    <thead>
                    <tr>
                        <th class="col-xl-2 col-lg-2 col-md-2.4 col-sm-2.4 col-xs-1.2">Título</th>
                        <th class="col-xl-2 col-lg-2 col-md-2.4 col-sm-2.4 col-xs-1.2">Autor</th>
                        <th class="col-xl-2 col-lg-2 col-md-2.4 col-sm-2.4 col-xs-0.8">Doador</th>
                        <th class="col-xl-2 col-lg-2 col-md-2.4 col-sm-1.2 col-xs-0.8">Situação</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="col-xl-2 col-lg-2 col-md-2.4 col-sm-2.4 col-xs-1.2">{{ $book->title }}</td>
                        <td class="col-xl-2 col-lg-2 col-md-2.4 col-sm-2.4 col-xs-1.2">{{ $book->author }}</td>
                        <td class="col-xl-2 col-lg-2 col-md-2.4 col-sm-2.4 col-xs-0.8">{{ $book->user->name }}</td>

                        @if ($book -> available === 0)
                            <td class="col-xl-2 col-lg-2 col-md-2.4 col-sm-1.2 col-xs-0.8">Emprestado!</td>
                        @else
                            <td class="col-xl-2 col-lg-2 col-md-2.4 col-sm-1.2 col-xs-0.8">Disponível</td>
                        @endif

                        <td class="col-md-2.4 col-sm-1.5 col-xs-2">
                            <form action="/books/show/{{ $book->id }}" method="GET">
                                <button type="submit" class="btn btn-success text-dark">
                                    <h3 class="more">+</h3>
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
