<?php

namespace App\Mail;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BorrowBookEmail extends Mailable
{

    use Queueable, SerializesModels;

    public Book $book;
    public Borrow $borrow;
    public User $user;

    public function __construct(Book $book, Borrow $borrow, User $user)
    {
        $this->book = $book;
        $this->borrow = $borrow;
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('email.borrowBookEmail', ['book' => $this->book,
            'borrow' => $this->borrow,'user' => $this->user]);
    }
}
