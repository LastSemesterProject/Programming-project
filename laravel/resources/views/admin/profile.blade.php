
@extends('layouts.master')
@section('content')

    @include('includes.menubar')

<?php $userId = Auth::id();?>

    <div class="profile-container">
        <div class="profile-detail">

            <img style="display:block; margin: 2em auto" src="{{URL::asset('/img/profile.jpg')}}">

            {{--<p style="text-align: center; margin-bottom: 5em;">{{Auth::user()->email}}</p>--}}


            <form action="{{route('submit-profile')}}">
            <div class="form-group">
                <p>Name:</p>
                <p>{{Auth::user()->name}}</p>
            </div>

            <div class="form-group">
                <p>Email:</p>
                <p>{{Auth::user()->email}}</p>
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
                <p>Suitability: </p>
                <input type="radio" name="suitability" value="indoor" checked>Indoor&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="suitability" value="outdoor">Outdoor
            </div>
            <div class="form-group">
                <p>Condition: </p>
                <input type="radio" name="conditionn" value="new" checked>New&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="conditionn" value="used">Used
            </div>
            <div class="form-group">
                <p>Price:</p>
                Min $ <input type="number" name="price" value="price"> - $ <input
                        type="number" name="price2"
                        value="price"> Max<br><br>

            </div>

                <input type="hidden" name="user_id" value="{{Auth::id()}}">


            <input class="btn btn-primary" type="submit" value="Save">

            </form>



        </div>
    </div>






@stop