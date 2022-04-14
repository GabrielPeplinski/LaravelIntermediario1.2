@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Editando o livro : {{ $book->title }}</h3>
    <form action="/books/update/{{ $book->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-lg-11 col-md-10 col-sm-10 col-xs-12 mb-2 mt-1">
            <label for="labelForTitle" class="form-label">Título do Livro:</label>
            <input type="text" class="form-control form-control-sm" name="title" value="{{ $book->title }}" required>
        </div>
        <div class="col-lg-11 col-md-10 col-sm-10 col-xs-12 mb-2">
            <label for="labelForAuthor" class="form-label">Autor do Livro:</label>
            <input type=" text" class="form-control form-control-sm" name="author" value="{{ $book->author }}" required>
        </div>
        <div class="col-lg-11 col-md-10 col-sm-10 col-xs-12 mb-2">
            <label for="labelForDonor" class="form-label">Quem o trouxe:</label>
            <input type="text" class="form-control form-control-sm" name="donor" id="donor" value="{{ $book->donor }}"
                required>
        </div>
        <button type="submit" class="btn btn-primary text-dark" value="Add Book">Atualizar Livro</button>
    </form>
</div>

@endsection