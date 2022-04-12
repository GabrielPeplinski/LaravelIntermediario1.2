<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Borrow;

class BorrowController extends Controller
{
    public function borrow($id)
    {   
        $borrow = new Borrow;
        $book = Book::findOrFail($id);
        $user = auth()->user();

        $borrow->book_id = $book->id;
        $borrow->user_id = $user->id;

        $borrow->return_date = date('Y-m-d ', strtotime('+1 week'));
        
        $book->borrow_id = $borrow->id;

        $book->save();
        $borrow->save();
        return redirect('/')->with('msg', 'Livro Emprestado com Sucesso!');
    }
}
