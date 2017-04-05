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



}