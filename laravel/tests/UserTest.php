<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Auth\User;
use Illuminate\Contracts\Auth\Authenticatable;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Register
     */

    public function testRegisterNewAccount()
    {
        $this->visit('auth/register')
            ->type('Me', 'name')
            ->type('someone@gmail.com', 'email')
            ->type('secret', 'password')
            ->type('secret', 'password_confirmation')
            ->press('Register')
            ->see('register')
            ->seeInDatabase('users', ['email' => 'someone@gmail.com']);
    }

    public function testRegisterExistingAccount() {
        $this->visit('auth/register')
            ->type('Me', 'name')
            ->type('test@test.com', 'email')
            ->type('testtest', 'password')
            ->type('testtest', 'password_confirmation')
            ->press('Register')
            ->seePageIs('auth/register')
            ->see('The email has already been taken');
    }

    public function testRegisterWithShortPassword() {

        $this->visit('auth/register')
            ->type('Me', 'name')
            ->type('test2@test2.com', 'email')
            ->type('test', 'password')
            ->type('test', 'password_confirmation')
            ->press('Register')
            ->seePageIs('auth/register')
            ->see('The password must be at least 6 characters');
    }

    public function testRegisterWithMismatchPassword() {
        $this->visit('auth/register')
            ->type('Me', 'name')
            ->type('test3@test3.com', 'email')
            ->type('testtest1', 'password')
            ->type('testtest2', 'password_confirmation')
            ->press('Register')
            ->seePageIs('auth/register')
            ->see('The password confirmation does not match');
    }


    /**
     * Login
     */

    public function testLoginWithWrongCredentials()
    {
        $this->visit('auth/login')
            ->see('Login')
            ->type('bad@bad.com', 'email')
            ->type('bad-password', 'password')
            ->check('remember')
            ->press('Login')
            ->seePageIs('auth/login')
            ->see('These credentials do not match our records');
    }

    public function testLoginWithRightCredentials()
    {
        $this->visit('auth/login')
            ->see('Login')
            ->type('123@123.com', 'email')
            ->type('123', 'password')
            ->check('remember')
            ->press('Login')
            ->seePageIs('/')
            ->see('Logout');
    }


//    public function testLoginWithWrongEmail()
//    {
//        $this->visit('auth/login')
//            ->see('Login')
//            ->type('badbad.com', 'email')
//            ->type('bad-password', 'password')
//            ->check('remember')
//            ->press('Login')
//            ->seePageIs('auth/login')
//            ->see('Please include an');
//    }

    /**
     * Logout
     */

    public function testLogout() {
        $user = factory(App\User::class)->create();
        $this->actingAs($user)
            ->visit('/')
            ->see('Logout');
    }





}
