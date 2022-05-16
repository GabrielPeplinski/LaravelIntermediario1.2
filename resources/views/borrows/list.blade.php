@extends('layouts.app')

@section('content')
    <h2>Livros Que Você emprestou:</h2>

    @if (count($myBorrows) === 0)
        <div class="alert alert-danger" role="alert">
            <p>Você ainda não emprestou nenhum livro!</p>
        </div>
    @else
        @foreach($myBorrows as $borrow)
            <div class="container">
                <table class="table col-md-8 col-sm-8 col-xs-10">
                    <thead>
                    <tr>
                        <th class="col-md-2.4 col-sm-2.4 col-xs-2">Título:</th>
                        <th class="col-md-2 col-sm-1.2 col-xs-1.2">Autor</th>
                        <th class="col-md-2.4 col-sm-2.4 col-xs-2">Data de Empréstimo</th>
                        <th class="col-md-2.4 col-sm-2.4 col-xs-2">Data de Devolução</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="col-md-2.4 col-sm-2.4 col-xs-2">
                            {{ $borrow->book->title }}
                        </td>
                        <td class="col-md-2 col-sm-1.2 col-xs-1.2">
                            {{ $borrow->book->author }}
                        </td>
                        <td class="col-md-2.4 col-sm-2.4 col-xs-2">
                            {{date('d/m/Y',strtotime($borrow->created_at))}}
                        </td>
                        <td class="col-md-2.4 col-sm-2.4 col-xs-2">
                            {{date('d/m/Y',strtotime($borrow->return_date))}}
                        </td>
                    </tr>
                    </tbody>
                    <td class="col-xl-2 col-lg-2 col-md-2.4 col-sm-1.2 col-xs-0.8">
                        <form class="w-10" action="/borrows/{{ $borrow->id}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn-sm btn-success text-dark">Prolongar</button>
                        </form>
                    </td>
                    <td class="col-xl-2 col-lg-2 col-md-2.4 col-sm-1.2 col-xs-0.8">
                        <form class="w-10" action="/borrows/{{ $borrow->id }}"
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sm btn-danger text-dark">Devolver</button>
                        </form>
                    </td>
                </table>
            </div>
        @endforeach
    @endif
@endsection
