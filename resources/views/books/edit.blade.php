@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Editando o livro : {{ $book->title }}</h3>
    <h4>Capa Atual:</h4>
    <form action="/books/{{ $book->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <img src="{{$book->getCoverImageUrl()}}" width="150px"><br/>
            <label for="exampleFormControlFile1">Insira uma Nova Capa:</label>
            <br>
            <input type="file" class="form-control-image mb-2" id="exampleFormControlFile1" name="image">
        </div>
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
            <label for="labelForDonor" class="form-label">Quem o trouxe:</label>
            <br>
            @foreach($users as $user)
                <input type="radio" name="donorId[]" value="{{ $user->id }}" class="radio" required>
                    {{  $user->name }}
                <br>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary text-dark" value="Add Book">Atualizar Livro</button>
    </form>
</div>

@endsection
