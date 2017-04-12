<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->visit('/dang-nhap');

        $this->type('admin@conganphuonganphu.com', 'email');

        $this->type('anPH@123', 'password');

        $this->press('Đăng nhập');

        $this->seePageIs('/quan-ly/tong-quan');
    }
}
