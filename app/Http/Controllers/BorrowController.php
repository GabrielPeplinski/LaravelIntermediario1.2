<?php

namespace App\Http\Controllers;

use App\Actions\Borrow\CreateBorrowAction;
use Illuminate\Http\Request;

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

    public function create($id)
    {
        $book = Book::findOrFail($id);
        $userBorrow = auth()->user();

        (new CreateBorrowAction())->execute($userBorrow, $book);

        return redirect('/')->with('msg', 'Livro Emprestado com Sucesso!');
    }

    public function list()
    {
        /*$borrows = Borrow::all();*/
        $borrows = auth()->user()->borrowed;

        /*$books = Book::all();*/
        $user = auth()->user();
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
        $books = Book::all();

        foreach($books as $book){
            if($book->id === $borrow->book_id)
                $book->available = true;
                $book->save();
        }

        $borrow->delete();
        return redirect('/')->with('msg', 'Livro Devolvido com Sucesso!');
    }

    public function update($id)
    {
        $borrow = Borrow::findOrFail($id);

        $old_date = $borrow -> return_date;
        $borrow->return_date = date('Y-m-d ', strtotime('+1week',strtotime($old_date)));
        $borrow->save();

        return redirect('/')->with('msg', 'Empréstimo Prolongado com Sucesso!');
    }
}
