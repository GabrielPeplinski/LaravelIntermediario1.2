@extends('layouts.app')

@section('content')
<h3>Livros Que Você emprestou:</h3>

@if (count($myBorrows) === 0)
<div class="alert alert-danger" role="alert">
    <p>Você ainda não emprestou nenhum livro!</p>
</div>
@else
<!--
@for($i = 0; $i < count($myBorrows); $i++) <div class="card bg-primary mb-2" style="width: 18rem;">
    <div class="card-body">
        @if($myBorrows[$i]->book_id === $books[$i]->id)
        <h5 class="card-title text-dark">Título : {{ $books[$i]->title }}</h5>
        <br>
        <h6 class="card-subtitle mb-2 text-dark">Autor : {{ $books[$i]->author }}</h6>
        <h6 class="card-subtitle mb-2 text-dark">Data de Empréstimo : {{date( 'd/m/Y' , 
            strtotime($myBorrows[$i]->created_at))}}
        </h6>
        <h6 class="card-subtitle mb-2 text-dark">Data de Empréstimo : {{date( 'd/m/Y' , 
            strtotime($myBorrows[$i]->return_date))}}
        </h6>
        <form action="/books/borrows/update/{{ $myBorrows[$i]->id }}" method="POST">
            @csrf
            @method('GET')
            <button type="submit" class="btn btn-success text-dark">Prolongar Empréstimo</button>
        </form>
        <form action="/books/borrows/delete/{{ $myBorrows[$i]->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger text-dark">Devolver</button>
        </form>
    </div>
    @endif
    </div>
    @endfor

    @endif

        -->
@for($i = 0; $i < count($myBorrows); $i++) 
<div class="container">
    @if($myBorrows[$i]->book_id === $books[$i]->id)
    <table class="table  col-md-8 col-sm-8 col-xs-11">
        <thead>
            <tr>
                <th class="col-md-2.4 col-sm-2.4 col-xs-2">Título:</th>
                <th class="col-md-2.4 col-sm-2.4 col-xs-2">Autor</th>
                <th class="col-md-2.4 col-sm-2.4 col-xs-2">Data de Empréstimo</th>
                <th class="col-md-2.4 col-sm-2.4 col-xs-2">Data de Devolução</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="col-md-2.4 col-sm-2.4 col-xs-2">{{ $books[$i]->title }}</td>
                <td class="col-md-2.4 col-sm-2.4 col-xs-2"> {{ $books[$i]->author }}</td>
                <td class="col-md-2.4 col-sm-2.4 col-xs-2">{{date('d/m/Y',strtotime($myBorrows[$i]->created_at))}}</td>
                <td class="col-md-2.4 col-sm-2.4 col-xs-2">{{date( 'd/m/Y',strtotime($myBorrows[$i]->return_date))}}</td>
            </tr>
        </tbody>
    </table>
    <div class="row">
        <div class="col-xg-1 col-lg-2 col-md-2 col-sm-3 col-xs-4">
        <form class="w-10" action="/books/borrows/update/{{ $myBorrows[$i]->id }}" method="POST">
            @csrf
            @method('GET')
            <button type="submit" class="btn-sm btn-success text-dark">Prolongar</button>
        </form>
        </div>
        <div class="col-xg-1 col-lg-2 col-md-2 col-sm-3 col-xs-4">
        <form class="w-10" action="/books/borrows/delete/{{ $myBorrows[$i]->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-sm btn-danger text-dark">Devolver</button>
        </form>
    </div>
</div>
    
    @endif
    @endfor
    @endsection