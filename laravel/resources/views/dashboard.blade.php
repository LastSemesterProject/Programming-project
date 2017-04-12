@extends('layouts.master')
@section('content')

    @include('includes.menubar')
    <div class="container-fluid">
        <div class="row">
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'sell-item')">Sell an item</button>
                <button class="tablinks" onclick="openTab(event, 'buy-item')">Buy an item</button>
                <button class="tablinks" onclick="openTab(event, 'Tokyo')">Tab3</button>
            </div>

            <div id="sell-item" class="tabcontent">
                <h3>Sell an item</h3>

                <form action="{{route('submit-form')}}">

                    <p>Title</p>
                    <input type="text" name="title" value="">

                    <p>Description</p>
                    <input type="text" name="description" value="">

                    <p>Item</p>

                    <select name="category">
                        <option value="chair">Chair</option>
                        <option value="table">Table</option>
                        <option value="sofa">Sofa</option>
                        <option value="bed">Bed</option>
                        <option value="shelves">Shelves</option>

                    </select>

                    <p>Material</p>
                    <select name="material">
                        <option value="wood">Wood</option>
                        <option value="marble">Marble</option>
                        <option value="steel">Steel</option>
                        <option value="leather">Leather</option>
                        <option value="glass">Glass</option>
                    </select>

                    <p>Colour</p>
                    <select name="colour">
                        <option value="black">Black</option>
                        <option value="black">White</option>
                        <option value="black">Red</option>
                        <option value="black">Blue</option>
                        <option value="black">Green</option>
                        <option value="black">Brown</option>
                    </select>

                    <p>Suitability </p>
                    <input type="radio" name="suitability" value="indoor" checked>Indoor<br>
                    <input type="radio" name="suitability" value="outdoor">Outdoor

                    <p>Condition </p>
                    <input type="radio" name="condition" value="new" checked>New<br>
                    <input type="radio" name="condition" value="used">Used


                    <p>Price</p>
                    <input type="number" name="price" value="price"><br><br>

                    <?php
                    if (Auth::check()) {
                        $userId = Auth::id();
                    }
                    ?>
                    <input type="hidden" name="seller_id" value="{{$userId}}">


                    <input class="btn btn-primary" type="submit" value="Submit">
                </form>


            </div>

            <div id="buy-item" class="tabcontent">
                <h3>Buy an Item</h3>
                <form action="{{route('find-item')}}">

                    <p>Title</p>
                    <input type="text" name="title" value="">

                    {{--<p>Description</p>--}}
                    {{--<input type="text" name="description" value="">--}}

                    <p>Item</p>

                    <select name="category">
                        <option value="chair">Chair</option>
                        <option value="table">Table</option>
                        <option value="sofa">Sofa</option>
                        <option value="bed">Bed</option>
                        <option value="shelves">Shelves</option>

                    </select>

                    <p>Material</p>
                    <select name="material">
                        <option value="wood">Wood</option>
                        <option value="marble">Marble</option>
                        <option value="steel">Steel</option>
                        <option value="leather">Leather</option>
                        <option value="glass">Glass</option>
                    </select>

                    <p>Colour</p>
                    <select name="colour">
                        <option value="black">Black</option>
                        <option value="black">White</option>
                        <option value="black">Red</option>
                        <option value="black">Blue</option>
                        <option value="black">Green</option>
                        <option value="black">Brown</option>
                    </select>

                    <p>Suitability </p>
                    <input type="radio" name="suitability" value="indoor" checked>Indoor<br>
                    <input type="radio" name="suitability" value="outdoor">Outdoor

                    <p>Condition </p>
                    <input type="radio" name="condition" value="new" checked>New<br>
                    <input type="radio" name="condition" value="used">Used


                    <p>Price</p>
                    Between <input type="number" name="price" value="price"> and <input type="number" name="price2" value="price"><br><br>


                    <input type="hidden" name="seller_id" value="{{$userId}}">

                    <?php
                    if (Auth::check()) {
                        $userId = Auth::id();
                    }
                    ?>


                    <input class="btn btn-primary" type="submit" value="Search">
                </form>
            </div>

            <div id="tab3" class="tabcontent">
                <h3>Tab3</h3>

                <p>Tab3</p>
            </div>


        </div>
    </div>






@stop