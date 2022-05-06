@extends('layouts.app')

@section('content')
    <h2>Histórico de Empréstimos:</h2>
    @if (count($borrows) == 0)
        <div class="alert alert-danger" role="alert">
            <p>Nenhum empréstimo foi realizado até o momento!</p>
        </div>
    @else
        <div class="container">
            <table class="table table-striped col-md-8 col-sm-8 col-xs-10">
                <thead>
                <tr>
                    <th class="col-md-1 col-sm-2.4 col-xs-2">ID:</th>
                    <th class="col-md-2.4 col-sm-3 col-xs-2">Livro:</th>
                    <th class="col-md-2 col-sm-1.2 col-xs-1.2">Quem emprestou</th>
                    <th class="col-md-2.4 col-sm-2.4 col-xs-2">Data do Empréstimo</th>
                    <th class="col-md-2.4 col-sm-2.4 col-xs-2">Data da Devolução</th>
                </tr>
                </thead>
                <tbody>
                @foreach($borrows as $borrow)
                    <tr>
                        <td class="col-md-1 col-sm-2.4 col-xs-2">
                            {{ $borrow->id }}
                        </td>
                        <td class="col-md-3 col-sm-1.2 col-xs-1.2">
                            {{ $borrow->book->title }}
                        </td>
                        <td class="col-md-2 col-sm-1.2 col-xs-1.2">
                            {{ $borrow->user->name }}
                        </td>
                        <td class="col-md-2.4 col-sm-2.4 col-xs-2">
                            {{ date('d/m/Y',strtotime($borrow->created_at)) }}
                        </td>
                        <td class="col-md-2.4 col-sm-2.4 col-xs-2">
                            {{ date('d/m/Y',strtotime($borrow->deleted_at)) }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
