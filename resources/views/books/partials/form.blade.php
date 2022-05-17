<div class="container-fluid ml-30px">
    <form enctype="multipart/form-data" action="/books" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlFile1">Insira uma imagem:</label>
            <br>
            <input type="file" class="form-control-image mb-2" id="exampleFormControlFile1" name="image">
        </div>
        <div class="col-lg-11 col-md-10 col-sm-10 col-xs-12 mb-2">
            <label for="labelForTitle" class="form-label">Título do Livro:</label>
            <input type="text" class="form-control form-control-sm" name="title" placeholder="Qual é o título?"
                   required>
        </div>
        <div class="col-lg-11 col-md-10 col-sm-10 col-xs-12 mb-2">
            <label for="labelForAuthor" class="form-label">Autor do Livro:</label>
            <input type="text" class="form-control form-control-sm" name="author" placeholder="Quem é o autor?"
                   required>
        </div>
        <button type="submit" class="btn btn-sm btn-primary text-dark" value="Add Book">Cadastrar</button>
    </form>
</div>
