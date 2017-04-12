
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
        <p>Condition: {{$product->condition}}</p>
        <p>Price: {{$product->price}}</p>
        <br><br>
        </div>
<?php
    }
        ?>

<h2>Similar items that you may be interested in:</h2>


<?php

\App\Http\Controllers\ProductController::similarItem();

?>



    @stop




