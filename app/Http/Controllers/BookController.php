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

        return view('books.create', ['user' => $user, 'users' => $users]);
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
        $books = Book::all();
        return view('books.list', ['books' => $books]);
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', ['book' => $book]);
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        (new DeleteBookAction())->execute($book);

        return redirect('/')->with('msg', 'Livro Deletado com Sucesso!');
    }

    public function edit($id)
    {
        $users = User::all();
        $book = Book::findOrFail($id);

        return view('books.edit', ['book' => $book, 'users' => $users]);
    }

    public function update(BookRequest $request)
    {
        $data = $request->validated('title', 'author');

        $book = Book::findOrFail($request->id);
        $donor = User::findOrFail($request->donorId[0]);

        (new UpdateBookAction())->execute($data, $donor, $book);

        return redirect('/')->with('msg', 'Livro Atualizado com Sucesso!');
    }
}
