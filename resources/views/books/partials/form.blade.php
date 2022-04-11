<form action="/books" method="POST">
    @csrf
    <div class="mb-3">
        <label for="labelForTitle" class="form-label">Título do Livro:</label>
        <input type="text" class="form-control form-control-sm" name="title" 
            placeholder="Qual é o título?" required>
    </div>
    <div class="mb-3">
        <label for="labelForAuthor" class="form-label">Autor do Livro:</label>
        <input type="text" class="form-control form-control-sm" name="author" 
            placeholder="Quem é o autor?" required>
    </div>
    <div class="mb-3">
        <label for="labelForDonor" class="form-label">Quem o trouxe:</label>
        <input type="text" class="form-control form-control-sm" name="donor" id="donor" 
            placeholder="Quem o trouxe?" required>
    </div>
    <button type="submit" class="btn btn-outline-primary" value="Add Book">Cadastrar Livro</button>
</form>
