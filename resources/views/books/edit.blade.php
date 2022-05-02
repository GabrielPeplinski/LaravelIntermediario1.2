@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Editando o livro : {{ $book->title }}</h3>
    <form action="/books/update/{{ $book->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-lg-11 col-md-10 col-sm-10 col-xs-12 mb-2 mt-1">
            <label for="labelForTitle" class="form-label">Título do Livro:</label>
            <input type="text" class="form-control form-control-sm" name="title" value="{{ $book->title }}"
                required>
        </div>
        <div class="col-lg-11 col-md-10 col-sm-10 col-xs-12 mb-2">
            <label for="labelForAuthor" class="form-label">Autor do Livro:</label>
            <input type=" text" class="form-control form-control-sm" name="author" value="{{ $book->author }}"
                required>
        </div>
        <div class="col-lg-11 col-md-10 col-sm-10 col-xs-12 mb-2">
            <table class="table col-md-8 col-sm-8 col-xs-10">
                <thead>
                    <th>Nome</th>
                    <th>Id</th>
                </thead>
                @foreach($users as $user)
                    <tbody>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->id }}</td>
                    </tbody>
                @endforeach
            </table>
            <label for="labelForDonor" class="form-label">Insira o ID de quem o trouxe:</label>
            <input type="text" class="form-control form-control-sm" name="donorId" value="{{ $book->user_id }}"
                   required>
        </div>
        <button type="submit" class="btn btn-primary text-dark" value="Add Book">Atualizar Livro</button>
    </form>
</div>

@endsection
