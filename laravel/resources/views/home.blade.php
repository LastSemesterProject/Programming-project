


@extends('layouts.master')
@section('content')
    <body>
    <ul>
        <div>
            <li><a href="index.html">SALES MATCHMAKER</a></li>
        </div>

        <li><a href="about.html">About</a></li>
        <li><a href="FAQs.html">FAQs</a></li>
        <li><a href="contact.html">Contact</a></li>

        <div class="floatRightside";>
            <li><a href="{{Auth::check() ? url('auth/logout') : url('auth/login')}}"> {{Auth::check() ? 'Logout' : 'Login'}}</a></li>
            <li><a href="signUp.html">Sign Up</a></li>
        </div>

    </ul>



    <!-- Search function in the middle -->
    <div class="box"; background-color:blue;>
        <div class="container-1"x>
            <input type="search" id="search" placeholder="Search..." />
        </div>
    </div>

    <!-- Image Gallery -->
    <p>
    <div class="gallery";>
        <a target="_blank" href="exampleImage.jpeg">
            <img src="exampleImage.jpeg" width="300" height="200">
        </a>
        <div class="desc">Add a description of the image hereLorem Ipsum is
            simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s, when an unknown printer took a
            galley of type and scrambled it to make a type specimen
            book.</div>
    </div>
    </p>
    <p>
    <div class="gallery">
        <a target="_blank" href="forest.jpg">
            <img src="exampleImage.jpeg" width="300" height="200">
        </a>
        <div class="desc">Add a description of the image hereLorem Ipsum is
            simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s, when an unknown printer took a
            galley of type and scrambled it to make a type specimen
            book.</div>
    </div>
    </p>
    <p>
    <div class="gallery";>
        <a target="_blank" href="lights.jpg">
            <img src="exampleImage.jpeg" width="300" height="200">
        </a>
        <div class="desc">Add a description of the image hereLorem Ipsum is
            simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s, when an unknown printer took a
            galley of type and scrambled it to make a type specimen
            book.</div>
    </div>
    </p>

    <!-- Some filler text -->



    <!-- EXAMPLES- - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
         <div>
               <topLinks>
                <input type="submit" value="Example Button"/> </form>
               </topLinks>
          </div>

      <div>
        <input type="submit" value="Go to Google"/>
      </div>
      <div>
      <a href="www.google.com" target="_blank">Click to open Google</a>
      </div>
     ---------------------------------------------------------------------->

    </body>
@stop