<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Request;
use App\Product;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class ProductController extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function addItem(Request $request) {
//        $product = new Product;
//        $product = Input::get('title');
//        $product = Input::get('description');
//        $product = Input::get('category');
//        $product = Input::get('material');
//        $product = Input::get('color');
//        $product = Input::get('suitability');
//        $product = Input::get('condition');
//        $product = Input::get('price');
//
//        return $product;

        Product::create(Request::all());

        return 'Data saved';

    }


    /**
     *
     */
    public function findItem() {

        $title = Input::get('title');
        $description = Input::get('description');
        $category = Input::get('category');
        $material = Input::get('material');
        $colour = Input::get('colour');
        $suitability = Input::get('suitability');
        $condition = Input::get('condition');
        $price = Input::get('price');
        $price2 = Input::get('price2');


        $products = DB::table('products')
//            ->select('id')
            ->where('title', $title)
            ->whereBetween('price',[$price, $price2])
            ->where('category', $category)
            ->where('material', $material)
            ->where('suitability', $suitability)
            ->where('colour', $colour)
            ->where('condition', $condition)
            ->get();

        return View('search-results',['products' => $products]);

    }

    public static function similarItem() {
        $title = Input::get('title');
        $description = Input::get('description');
        $category = Input::get('category');
        $material = Input::get('material');
        $colour = Input::get('colour');
        $suitability = Input::get('suitability');
        $condition = Input::get('condition');
        $price = Input::get('price');
        $price2 = Input::get('price2');


        $similarProducts = DB::table('products')
//            ->select('id')
            ->where('title', $title)
            ->orWhereBetween('price',[$price, $price2])
            ->orWhere('category', $category)
            ->orWhere('material', $material)
            ->orWhere('suitability', $suitability)
            ->orWhere('colour', $colour)
            ->orWhere('condition', $condition)
            ->get();

//        return View('search-results',['similarProducts' => $similarProducts]);

        foreach ($similarProducts as $product){
        echo <<<HERE

        <div class="product-tile">
        <strong><p>Product ID: {$product->id}</p></strong>
        <p>Seller ID: {$product->seller_id}</p>
        <p>Title: {$product->title}</p>
        <p>Description: {$product->description}</p>
        <p>Category: {$product->category}</p>
        <p>Material: {$product->material}</p>
        <p>Color: {$product->colour}</p>
        <p>Suitability: {$product->suitability}</p>
        <p>Condition: {$product->condition}</p>
        <p>Price: {$product->price}</p>
        <br><br>
        </div>


HERE;

        }

    }



}