@extends('layouts.app')

@section('content')

<form action="/books/update/{{ $book->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="labelForTitle" class="form-label">Título do Livro:</label>
        <input type="text" class="form-control form-control-sm" name="title" 
            value="{{ $book->title }}" required>
    </div>
    <div class="mb-3">
        <label for="labelForAuthor" class="form-label">Autor do Livro:</label>
        <input type="text" class="form-control form-control-sm" name="author" 
            value="{{ $book->author }}" required>
    </div>
    <div class="mb-3">
        <label for="labelForDonor" class="form-label">Quem o trouxe:</label>
        <input type="text" class="form-control form-control-sm" name="donor" id="donor" 
            value="{{ $book->donor }}" required>
    </div>
    <button type="submit" class="btn btn-outline-primary" value="Add Book">Atualizar Livro</button>
</form>

@endsection