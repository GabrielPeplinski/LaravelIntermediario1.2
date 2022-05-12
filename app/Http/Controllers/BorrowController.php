<?php

namespace App\Http\Controllers;

use App\Actions\Borrow\CreateBorrowAction;
use App\Actions\Borrow\DeleteBorrowAction;
use App\Actions\Borrow\UpdateBorrowAction;

use App\Models\Book;
use App\Models\Borrow;

class BorrowController extends Controller
{
    public function store(Book $book)
    {
        $userBorrow = auth()->user();

        (new CreateBorrowAction())->execute($userBorrow, $book);

        return redirect('/')->with('msg', 'Livro Emprestado com Sucesso!');
    }

    public function list()
    {
        $myBorrows = auth()->user()->borrowed;

        return view('borrows.list', compact('myBorrows'))->with('Livros Encontrados!');
    }

    public function destroy(Borrow $borrow)
    {
        (new DeleteBorrowAction())->execute($borrow);

        return redirect('/')->with('msg', 'Livro Devolvido com Sucesso!');
    }

    public function update(Borrow $borrow)
    {
        (new UpdateBorrowAction())->execute($borrow);

        return redirect('/')->with('msg', 'Empréstimo Prolongado com Sucesso!');
    }

    public function makeReport()
    {
        $borrows = cache()->remember('borrowlist', 60, function () {
            return Borrow::withTrashed()->get();
        });

        return view('borrows.report', compact('borrows'));
    }
}
