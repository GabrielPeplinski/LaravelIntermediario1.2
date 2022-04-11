<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        /*
        BookRequest $bookRequest
        $data = $bookRequest->validated();
        
        Book::query()->create($data);
        */

        $book = new Book;

        $book->title = $request->title;
        $book->author = $request->author;
        $book->donor = $request->donor;

        $user = auth()->user();
        $book->user_id = $user->id;

        $book->save();

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
        $book = Book::findOrFail($id)->delete();
        return redirect('/')->with('msg', 'Livro Deletado com Sucesso!');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', ['book' => $book]);
    }

    public function update(Request $request)
    {
        $book = Book::findOrFail($request->id);
        
        $book->title = $request->title;
        $book->author = $request->author;
        $book->donor = $request->donor;

        $book->save();

        return redirect('/')->with('msg', 'Livro Atualizado com Sucesso!');
    }
}