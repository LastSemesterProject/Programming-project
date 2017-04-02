<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NewTest extends TestCase
{

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testRegisterNewAccount()
    {
        $this->visit('register')
            ->type('Me', 'name')
            ->type('someone@gmail.com', 'email')
            ->type('secret', 'password')
            ->press('Register')
            ->see('register')
            ->seeInDatabase('users', ['email' => 'someone@gmail.com']);
    }

    public function testRegisterWithShortPassword() {

        $this->visit('register')
            ->type('Me', 'name')
            ->type('test2@test2.com', 'email')
            ->type('test', 'password')
            ->type('test', 'password_confirmation')
            ->press('Register')
            ->seePageIs('register')
            ->see('The password must be at least 6 characters');
    }


    public function testRegisterExistingAccount() {
        $this->visit('register')
            ->type('Me', 'name')
            ->type('test@test.com', 'email')
            ->type('testtest', 'password')
            ->type('testtest', 'password_confirmation')
            ->press('Register')
            ->seePageIs('register')
            ->see('The email has already been taken');
    }

}
