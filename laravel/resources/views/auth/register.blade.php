@extends('layouts.master')

@section('content')

    <div>
        @include('includes.menubar')
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="center col-md-8 col-md-offset-2">
                <div class="panel panel-default panel-custom panel-custom-register">
                    <div class="center panel-heading ">Register</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{url('auth/register')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <div class="center col-md-6">
                                    <label class=" control-label">Name</label>
                                </div>
                                <div class="center col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="center col-md-6">
                                    <label class=" control-label">Email Address</label>
                                </div>
                                <div class="center col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="center col-md-6">
                                    <label class=" control-label">Password</label>
                                </div>
                                <div class="center col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="center col-md-6">
                                    <label class=" control-label">Confirm Password</label>
                                </div>
                                <div class="center col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>


                            <div class="form-group">

                                <div class="center col-md-6">
                                    <p>Item:</p>

                                    <select name="category">
                                        <option value="chair">Chair</option>
                                        <option value="table">Table</option>
                                        <option value="sofa">Sofa</option>
                                        <option value="bed">Bed</option>
                                        <option value="shelves">Shelves</option>

                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="center col-md-6">
                                    <p>Material:</p>
                                    <select name="material">
                                        <option value="wood">Wood</option>
                                        <option value="marble">Marble</option>
                                        <option value="steel">Steel</option>
                                        <option value="leather">Leather</option>
                                        <option value="glass">Glass</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="center col-md-6">
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
                            </div>
                            <div class="form-group">
                                <div class="center col-md-6">
                                    <p>Suitability: </p>
                                    <input type="radio" name="suitability" value="indoor" checked>Indoor&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="suitability" value="outdoor">Outdoor
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="center col-md-6">
                                    <p>Condition: </p>
                                    <input type="radio" name="condition" value="new" checked>New&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="condition" value="used">Used
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="center col-md-6">
                                    <p>Price:</p>
                                    Min $ <input type="number" name="price" value="price"> - $ <input
                                            type="number" name="price2"
                                            value="price"> Max<br><br>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="center col-md-6">
                                    <div class="center col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection