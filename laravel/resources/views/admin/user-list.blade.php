
@extends('layouts.master')
@section('content')


    <div class="body-container" style="height: 120em;">
    @include('includes.menubar')




        <div class="table-container">
            <h2>User List</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <td>User ID</td>
                        <td>User Name</td>
                        <td>Email</td>

                    </tr>
                    <?php


                    $users = DB::table('users')
                            ->select('*')
                            ->get();

                    foreach($users as $user) {



                    ?>
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>


                    </tr>

                    <?php
                    }

                    ?>

                    </table>
                </div>
            </div>





</div>

@stop