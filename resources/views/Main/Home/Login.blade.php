@extends('Main.Master')

@section('title')
    <title>Login</title>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <!-- Include error message div -->
            @include('Partials.Event')

            <form action="{{ url('signin') }}" class="form-horizontal" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="username" class="col-md-3 control-label">Username</label>
                    <div class="col-md-9">
                        <input type="text" name="username" id="username" class="form-control"
                               value="{{ old('username') }}" placeholder="Username">
                    </div> <!-- div.col-md-9 -->
                </div> <!-- div.form-group -->

                <div class="form-group">
                    <label for="password" class="col-md-3 control-label">Password</label>
                    <div class="col-md-9">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    </div> <!-- div.col-md-9 -->
                </div> <!-- div.form-group -->

                <div class="form-group">
                    <div class="col-md-offset-10 col-md-2">
                        <input type="submit" value="Login" class="btn btn-primary">
                    </div> <!-- div.col-md-offset-10.col-md-2 -->
                </div> <!-- div.form-group -->
            </form> <!-- form.form-horizontal -->
        </div> <!-- /.col-md-6.col-md-offset-3 -->
    </div> <!-- /.row -->
@stop