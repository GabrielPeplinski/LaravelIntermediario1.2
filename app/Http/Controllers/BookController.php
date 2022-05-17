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


        (new CreateBookAction())->execute($data, $user);

        return redirect('/')->with('msg', 'Livro Cadastrado com Sucesso!');
    }

    public function index()
    {
        $books = cache()->remember('booklist', 60, function (){
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

        $users = cache()->remember('userlist', 60, function (){
           return User::all();
        });

        return view('books.edit', compact(['book', 'users']));
    }

    public function update(BookRequest $request, Book $book)
    {
        $data = $request->validated();
        $donor = User::findOrFail($request->donorId[0]);

//        $data['image'] = $request->file('image');
//        Storage::disk('public')->put($data['image'], $data['image']);
        //$book->addMedia(public_path('uploads' . '/' . $data['image']))->toMediaCollection('images');
        (new UpdateBookAction())->execute($data, $donor, $book);

        return redirect('/')->with('msg', 'Livro Atualizado com Sucesso!');
    }
}
