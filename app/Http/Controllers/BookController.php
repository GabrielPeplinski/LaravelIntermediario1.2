<?php

namespace App\Http\Controllers;

use App\Actions\Book\CreateBookAction;
use App\Actions\Book\DeleteBookAction;
use App\Actions\Book\UpdateBookAction;
use App\Http\Requests\BookRequest;

use App\Models\Book;
use App\Models\User;

class BookController extends Controller
{
    public function index()
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
        $data = $request->validated('title', 'author');
        $user = auth()->user();

        (new CreateBookAction())->execute($data, $user);

        return redirect('/')->with('msg', 'Livro Cadastrado com Sucesso!');
    }

    public function list()
    {
        $books = cache()->remember('booklist', 60*60*24, function (){
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

        $users = cache()->remember('userlist', 60*60*24, function (){
           return User::all();
        });

        return view('books.edit', compact(['book', 'users']));
    }

    public function update(BookRequest $request, Book $book)
    {
        $data = $request->validated('title', 'author');
        $donor = User::findOrFail($request->donorId[0]);

        (new UpdateBookAction())->execute($data, $donor, $book);

        return redirect('/')->with('msg', 'Livro Atualizado com Sucesso!');
    }
}
