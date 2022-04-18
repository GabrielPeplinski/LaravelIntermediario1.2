@extends('layouts.app')

@section('content')
<h3>Livros Que Você emprestou:</h3>

@if (count($myBorrows) === 0)
<div class="alert alert-danger" role="alert">
    <p>Você ainda não emprestou nenhum livro!</p>
</div>
@else
@for($i = 0; $i < count($myBorrows); $i++) <div class="container">
    @if($myBorrows[$i]->book_id === $books[$i]->id)
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
                <td class="col-md-2.4 col-sm-2.4 col-xs-2">{{ $books[$i]->title }}</td>
                <td class="col-md-2 col-sm-1.2 col-xs-1.2"> {{ $books[$i]->author }}</td>
                <td class="col-md-2.4 col-sm-2.4 col-xs-2">{{date('d/m/Y',strtotime($myBorrows[$i]->created_at))}}</td>
                <td class="col-md-2.4 col-sm-2.4 col-xs-2">{{date( 'd/m/Y',strtotime($myBorrows[$i]->return_date))}}
                </td>
            </tr>
        </tbody>
        <div class="row">
            <td>
                <div class="col-xl-2 col-lg-2 col-md-2.4 col-sm-1.2 col-xs-0.8">
                    <form class="w-10" action="/books/borrows/update/{{ $myBorrows[$i]->id }}" method="POST">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn-sm btn-success text-dark">Prolongar</button>
                    </form>
                </div>
            </td>
            <td>
                <div class="col-xl-2 col-lg-2 col-md-2.4 col-sm-1.2 col-xs-0.8">
                    <form class="w-10" action="/books/borrows/delete/{{ $myBorrows[$i]->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-sm btn-danger text-dark">Devolver</button>
                    </form>
                </div>
            </td>
    </table>
    @endif
    @endfor
    @endif
    @endsection