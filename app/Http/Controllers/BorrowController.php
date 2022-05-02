<?php

namespace App\Http\Controllers;

use App\Actions\Borrow\CreateBorrowAction;
use App\Actions\Borrow\DeleteBorrowAction;
use App\Actions\Borrow\UpdateBorrowAction;

use App\Models\Book;
use App\Models\Borrow;

class BorrowController extends Controller
{
    /*
     * Sem usar Action
     *
    public function create($id)
    {
        $book = Book::findOrFail($id);
        $borrow = new Borrow;
        $book = Book::findOrFail($id);
        $user = auth()->user();
        $borrow = Borrow::create([
            'book_id' => $book->id,
            'user_id' => $user->id,
            'return_date' => date('Y-m-d ', strtotime('+1 week'))
        ]);

        $book->available = false;

        $book->save();

        return redirect('/')->with('msg', 'Livro Emprestado com Sucesso!');
    }
    */

    public function store($id)
    {
        $book = Book::findOrFail($id);
        $userBorrow = auth()->user();

        (new CreateBorrowAction())->execute($userBorrow, $book);

        return redirect('/')->with('msg', 'Livro Emprestado com Sucesso!');
    }

    public function list()
    {
        $borrows = auth()->user()->borrowed;
        $books = [];

        foreach($borrows as $borrow) {
            array_push($books, $borrow->book);
        }

        return view('borrows.list',['myBorrows' => $borrows,
                'books' => $books])->with('Livros Encontrados!');
    }

    public function destroy($id)
    {
        $borrow = Borrow::findOrFail($id);

        (new DeleteBorrowAction())->execute($borrow);

        return redirect('/')->with('msg', 'Livro Devolvido com Sucesso!');
    }

    public function update($id)
    {
        $borrow = Borrow::findOrFail($id);

        (new UpdateBorrowAction())->execute($borrow);

        return redirect('/')->with('msg', 'Empréstimo Prolongado com Sucesso!');
    }
}
