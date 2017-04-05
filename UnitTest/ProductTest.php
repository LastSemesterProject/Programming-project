<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Auth\User;
use Illuminate\Contracts\Auth\Authenticatable;

class ProductTest extends TestCase
{
    use DatabaseTransactions;

    public function testGetDashboardWithAuth() {
        $user = App\User::create(array('name' => 'john', 'email' => 'John@john.com', 'password' => "123"));
        $this->be($user);
        $this->visit('dashboard');
    }

    public function testGetDashboardWithoutAuth() {
        $this->get('dashboard')
            ->seeStatusCode(302);
    }

    public function testAddProduct() {
        $user = App\User::create(array('name' => 'john', 'email' => 'John@john.com', 'password' => "123"));
        $this->be($user);
        $this->visit('dashboard')
            ->see('Sell an Item')
            ->type('World\'s best bed','title')
            ->type('This is the bestest bed ever!!!', 'description')
            ->press('Submit')
            ->seeInDatabase('products', ['title' => 'World\'s best bed',
                'description' => 'This is the bestest bed ever!!!']);
    }




}



