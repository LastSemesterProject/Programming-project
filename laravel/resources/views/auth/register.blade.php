@extends('layouts.master')

@section('content')

    <div>
        @include('includes.menubar')
    </div>
<div class="container-fluid">
    <div class="row">
        <div class="center col-md-8 col-md-offset-2">
            <div class="panel panel-default panel-custom">
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
                            <div class="center col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection