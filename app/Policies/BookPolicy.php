<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function destroy($user, $book): bool
    {
        return $user->id === $book->user_id;
    }

    public function edit($user, $book): bool
    {
        return $user->id === $book->user_id;
    }
}
