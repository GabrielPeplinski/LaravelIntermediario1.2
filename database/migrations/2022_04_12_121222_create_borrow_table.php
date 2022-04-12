<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            // Criar rota de empréstimo de livro
            // Table Emprestimos
            // ------------------
            // id, data, devolução, user_id

            $table->id();
            $table->foreignId('book_id')->constrained();
            $table->timestamps();
            $table->date('return_date');

            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrows');

        $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');

            $table->foreignId('book_id')
            ->constrained()
            ->onDelete('cascade');
    }
}