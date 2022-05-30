<?php

namespace App\Jobs;

use App\Mail\BorrowBookEmail;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendBorrowEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public Book $book;
    public Borrow $borrow;
    public User $user;


    public function __construct(Book $book, Borrow $borrow, User $user)
    {
        $this->book = $book;
        $this->borrow = $borrow;
        $this->user = $user;
    }

    public function handle()
    {
        for ($i = 0; $i < 5; $i++) {
            sleep(2);
            Mail::to('teste@gmail.com')
                ->send((new BorrowBookEmail($this->book, $this->borrow, $this->user)));
        }
    }
}
