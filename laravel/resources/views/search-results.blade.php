
@extends('layouts.master')
@section('content')

    @include('includes.menubar')

<?php


?>
<h2>{{count($products)}} products found.</h2><br><br>

<?php
foreach ($products as $product) {?>
        <div class="product-tile">
        <strong><p>Product ID: {{$product->id}}</p></strong>
        <p>Seller ID: {{$product->seller_id}}</p>
        <p>Title: {{$product->title}}</p>
        <p>Description: {{$product->description}}</p>
        <p>Category: {{$product->category}}</p>
        <p>Material: {{$product->material}}</p>
        <p>Color: {{$product->colour}}</p>
        <p>Suitability: {{$product->suitability}}</p>
        <p>Condition: {{$product->conditionn}}</p>
        <p>Price: {{$product->price}}</p>
            <p>Pic: <img src="data:image/jpeg;base64,<?php base64_encode($product->pic) ?>" /></p>
            <p>Relevance score: {{$product->rank}}</p>
        <br><br>
        </div>
<?php
    }

        $savedData = DB::table('users')
            ->where('id', Auth::id())
            ->update(['last_search' => json_encode($products)]);



        ?>

{{--<h2>Similar items that you may be interested in:</h2>--}}


{{--<?php--}}

{{--\App\Http\Controllers\ProductController::similarItem();--}}

{{--?>--}}



    @stop




