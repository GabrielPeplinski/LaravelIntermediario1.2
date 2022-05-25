<?php

namespace App\Http\Controllers;

use App\Actions\Book\CreateBookAction;
use App\Actions\Book\DeleteBookAction;
use App\Actions\Book\UpdateBookAction;
use App\Dto\BookData;
use App\Http\Requests\BookRequest;

use App\Models\Book;
use App\Models\User;

class BookController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function create()
    {
        $user = auth()->user();
        $users = User::all();

        return view('books.create',compact('user', 'users'));
    }

    public function store(BookRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user();

        $bookData = new BookData($data);

        (new CreateBookAction())->execute($bookData, $user);

        return redirect('/')->with('msg', 'Livro Cadastrado com Sucesso!');
    }

    public function index()
    {
        $books = cache()->remember('booklist', 30, function (){
            return Book::all();
        });

        return view('books.list', compact('books'));
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function destroy(Book $book)
    {
        $this->authorize('destroy', $book);

        (new DeleteBookAction())->execute($book);

        return redirect('/')->with('msg', 'Livro Deletado com Sucesso!');
    }

    public function edit(Book $book)
    {
        $this->authorize('edit', $book);

        $users = cache()->remember('userlist', 30, function (){
           return User::all();
        });

        return view('books.edit', compact(['book', 'users']));
    }

    public function update(BookRequest $request, Book $book)
    {
        $data = $request->validated();
        $donor = User::findOrFail($request->donorId[0]);

        $bookData = new BookData($data);

        (new UpdateBookAction())->execute($bookData, $donor, $book);

        return redirect('/')->with('msg', 'Livro Atualizado com Sucesso!');
    }
}
