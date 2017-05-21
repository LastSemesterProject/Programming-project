@extends('layouts.master')
@section('content')

    <div class="body-container">

        @include('includes.menubar')

        <?php
        if (Auth::check()) {
        ?>


            <?php

            $savedData = DB::table('users')
                    ->select(DB::raw('*
                                    '))->where('id', Auth::id())->get();


            foreach ($savedData as $data) {
            $decodedData = json_decode($data->last_search);

                ?>




            <div class="table-container">
                <h2>Recent Results</h2>
            <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <td>Product ID</td>
                    <td>Seller ID</td>
                    <td>Title</td>
                    <td>Description</td>
                    <td>Category</td>
                    <td>Material</td>
                    <td>Color</td>
                    <td>Suitability</td>
                    <td>Condition</td>
                    <td>Price</td>
                </tr>


                <?php
                $i = 0;
            foreach ($decodedData as $product) {
                if ($i == 5) break;
                ?>


                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->seller_id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->material}}</td>
                    <td>{{$product->colour}}</td>
                    <td>{{$product->suitability}}</td>
                    <td>{{$product->conditionn}}</td>
                    <td>{{$product->price}}</td>

                </tr>
            <?php
                    $i++;
            }
            } ?>
            </table>
            </div>
        </div>
        </div>


        <?php
        } else {
        ?>
        <div class="body-text-container">

            <div class="body-text">

                <p class="gray">LOOKING FOR</p>

                <p class="black">THE RIGHT</p>

                <p class="black">FURNITURE</p>

                <p class="gray">FOR YOU.</p>

                <p id="paragraph">An easy solution for users to look for and
                    advertise furniture online using a match-making
                    system</p>

                <p class="btn btn-primary"><a class="get-started" href="{{'auth/login'}}">Get Started</a></p>

            </div>


        </div>


        <?php
        }
        ?>




        <!-- Search function in the middle -->
        {{--<div class="box"; background-color:blue;>--}}
        {{--<div class="container-1"x>--}}
        {{--<input type="search" id="search" placeholder="Search..." />--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<!-- Image Gallery -->--}}
        {{--<p>--}}
        {{--<div class="gallery";>--}}
        {{--<a target="_blank" href="exampleImage.jpeg">--}}
        {{--<img src="exampleImage.jpeg" width="300" height="200">--}}
        {{--</a>--}}
        {{--<div class="desc">Add a description of the image hereLorem Ipsum is--}}
        {{--simply dummy text of the printing and typesetting industry.--}}
        {{--Lorem Ipsum has been the industry's standard dummy text--}}
        {{--ever since the 1500s, when an unknown printer took a--}}
        {{--galley of type and scrambled it to make a type specimen--}}
        {{--book.</div>--}}
        {{--</div>--}}
        {{--</p>--}}
        {{--<p>--}}
        {{--<div class="gallery">--}}
        {{--<a target="_blank" href="forest.jpg">--}}
        {{--<img src="exampleImage.jpeg" width="300" height="200">--}}
        {{--</a>--}}
        {{--<div class="desc">Add a description of the image hereLorem Ipsum is--}}
        {{--simply dummy text of the printing and typesetting industry.--}}
        {{--Lorem Ipsum has been the industry's standard dummy text--}}
        {{--ever since the 1500s, when an unknown printer took a--}}
        {{--galley of type and scrambled it to make a type specimen--}}
        {{--book.</div>--}}
        {{--</div>--}}
        {{--</p>--}}
        {{--<p>--}}
        {{--<div class="gallery";>--}}
        {{--<a target="_blank" href="lights.jpg">--}}
        {{--<img src="exampleImage.jpeg" width="300" height="200">--}}
        {{--</a>--}}
        {{--<div class="desc">Add a description of the image hereLorem Ipsum is--}}
        {{--simply dummy text of the printing and typesetting industry.--}}
        {{--Lorem Ipsum has been the industry's standard dummy text--}}
        {{--ever since the 1500s, when an unknown printer took a--}}
        {{--galley of type and scrambled it to make a type specimen--}}
        {{--book.</div>--}}
        {{--</div>--}}
        {{--</p>--}}

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
    </div>


@stop