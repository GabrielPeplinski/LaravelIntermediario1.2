<div class="container-fluid ml-30px">
    <form action="/books" method="POST">
        @csrf
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
        <div class="col-lg-11 col-md-10 col-sm-10 col-xs-12 mb-2">
            <label for="labelForDonor" class="form-label">Quem o trouxe:</label>
            <input type="text" class="form-control form-control-sm" name="donor" id="donor" 
                    placeholder="Quem o trouxe?"
                    value="{{ $user->name }}" required>
        </div>
        <button type="submit" class="btn btn-sm btn-primary text-dark" value="Add Book">Cadastrar</button>
    </form>
</div>