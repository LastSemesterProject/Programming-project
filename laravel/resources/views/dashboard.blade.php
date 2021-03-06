@extends('layouts.master')
@section('content')

    @include('includes.menubar')
    <div class="container-fluid">
        <div class="row">
            <div class="tab">
                {{--<button class="tablinks" onclick="openTab(event, '')">Profile</button>--}}
                <button class="tablinks" onclick="openTab(event, 'buy-item')">Buy Item</button>
                <button class="tablinks" onclick="openTab(event, 'sell-item')">Sell an item</button>

            </div>

            <div id="sell-item" class="col-md-8 tabcontent">
                <h3>Sell an item</h3>

                <form action="{{route('submit-form')}}">

                    <div class="form-container">

                        <div class="form-group">
                            <p>Title:</p>
                            <input type="text" name="title" value="">
                        </div>

                        <div class="form-group">
                            <p>Description:</p>
                            <input type="text" name="description" value="">
                        </div>

                        <div class="form-group">
                            <p>Item:</p>

                            <select name="category">
                                <option value="chair">Chair</option>
                                <option value="table">Table</option>
                                <option value="sofa">Sofa</option>
                                <option value="bed">Bed</option>
                                <option value="shelves">Shelves</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <p>Material:</p>
                            <select name="material">
                                <option value="wood">Wood</option>
                                <option value="marble">Marble</option>
                                <option value="steel">Steel</option>
                                <option value="leather">Leather</option>
                                <option value="glass">Glass</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <p>Colour:</p>
                            <select name="colour">
                                <option value="black">Black</option>
                                <option value="black">White</option>
                                <option value="black">Red</option>
                                <option value="black">Blue</option>
                                <option value="black">Green</option>
                                <option value="black">Brown</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <p>Suitability:</p>
                            <input type="radio" name="suitability" value="indoor" checked>Indoor&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="suitability" value="outdoor">Outdoor
                        </div>

                        <div class="form-group">
                            <p>Condition: </p>
                            <input type="radio" name="condition" value="new" checked>New&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="condition" value="used">Used
                        </div>
                        <div class="form-group">
                            <p>Price:</p>
                            <input type="number" name="price" value="price"><br><br>
                        </div>
                        <div class="form-group">
                            <p for="image">Image:</p>
                            <input type="file" name="pic" accept="image/*">
                        </div>
                        <?php
                        if (Auth::check()) {
                            $userId = Auth::id();
                        }
                        ?>
                        <input type="hidden" name="seller_id" value="{{$userId}}">


                        <input class="btn btn-primary" type="submit" value="Submit">

                    </div>
                </form>


            </div>

            <div id="buy-item" class="tabcontent">




                <h3>Search Item</h3>

                <form action="{{route('find-item')}}">

                    <div class="form-container">

                        <div class="form-group">
                            <p>Title:</p>
                            <input type="text" name="title" value="">
                        </div>

                        {{--<p>Description</p>--}}
                        {{--<input type="text" name="description" value="">--}}
                        <div class="form-group">
                            <p>Item:</p>

                            <select name="category">
                                <option value="chair">Chair</option>
                                <option value="table">Table</option>
                                <option value="sofa">Sofa</option>
                                <option value="bed">Bed</option>
                                <option value="shelves">Shelves</option>

                            </select>
                        </div>


                        <div class="form-group">
                            <p>Material:</p>
                            <select name="material">
                                <option value="wood">Wood</option>
                                <option value="marble">Marble</option>
                                <option value="steel">Steel</option>
                                <option value="leather">Leather</option>
                                <option value="glass">Glass</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Colour:</p>
                            <select name="colour">
                                <option value="black">Black</option>
                                <option value="black">White</option>
                                <option value="black">Red</option>
                                <option value="black">Blue</option>
                                <option value="black">Green</option>
                                <option value="black">Brown</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Suitability: </p>
                            <input type="radio" name="suitability" value="indoor" checked>Indoor&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="suitability" value="outdoor">Outdoor
                        </div>
                        <div class="form-group">
                            <p>Condition: </p>
                            <input type="radio" name="condition" value="new" checked>New&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="condition" value="used">Used
                        </div>
                        <div class="form-group">
                            <p>Price:</p>
                            Min $ <input type="number" name="price" value="price"> - $ <input
                                    type="number" name="price2"
                                    value="price"> Max<br><br>

                        </div>
                        <input type="hidden" name="seller_id" value="{{$userId}}">

                        <?php
                        if (Auth::check()) {
                            $userId = Auth::id();
                        }
                        ?>


                        <input class="btn btn-primary" type="submit" value="Search">

                    </div>
                </form>
            </div>

            <div id="recent-search" class="col-md-8 tabcontent">

                <div class="recent-container">
                    <?php

                    $savedData = DB::table('users')
                            ->select(DB::raw('*
                                    '))->where('id', Auth::id())->get();

                    foreach ($savedData as $data) {
                    $decodedData = json_decode($data->last_search);

                        foreach ($decodedData as $product) {?>
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
                            <p>Pic: <img src="data:image/jpeg;base64,<?php base64_encode($product->pic) ?>"/></p>
                            <p>Relevance score: {{$product->rank}}</p>
                            <br><br>
                        </div>
                        <?php
                        }
                    } ?>

                </div>
            </div>
        </div>
    </div>






@stop