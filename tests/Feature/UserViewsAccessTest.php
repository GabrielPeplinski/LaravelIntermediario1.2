<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserViewsAccessTest extends TestCase
{
    public function test_only_logged_users_can_see_create_book_view()
    {
        $response = $this->get('/books/create');

        $response->assertRedirect('/login');
    }

    public function test_only_logged_users_can_see_list_books_view()
    {
        $response = $this->get('/books');

        $response->assertRedirect('/login');
    }

    public function test_only_logged_users_can_see_borrows_view()
    {
        $response = $this->get('/borrows');

        $response->assertRedirect('/login');
    }

    public function test_all_users_can_see_welcome_view()
    {
        $response = $this->get('/');

        $response->assertViewIs('welcome');
    }
}
