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


    public function testFindNoMatchingProduct() {
        $user = App\User::create(array('name' => 'john', 'email' => 'John@john.com', 'password' => "123"));
        $this->be($user);
        $this->visit('dashboard')
            ->see('Buy an Item')
            ->type('123','title')
            ->press('Search')
            ->see('0 products found');
    }

    public function testFindMathchingProduct() {
        $user = App\User::create(array('name' => 'john', 'email' => 'John@john.com', 'password' => "123"));
        $this->be($user);
        $this->visit('dashboard')
            ->see('Buy an Item')
            ->type('chair','title')
            ->select('sofa', 'category')
            ->select('steel', 'material')
            ->select('black', 'colour')
            ->select('outdoor','suitability')
            ->select('new', 'condition')
            ->type('1', 'price')
            ->type('10','price2')
            ->press('Search')
            ->see('2 products found');
    }

    public function testSimilarProductShown() {
        $user = App\User::create(array('name' => 'john', 'email' => 'John@john.com', 'password' => "123"));
        $this->be($user);
        $this->visit('dashboard')
            ->see('Buy an Item')
            ->type('chair','title')
            ->press('Search')
            ->see('Similar Items that you may be interested in');
    }




}



