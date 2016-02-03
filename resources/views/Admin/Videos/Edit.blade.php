@extends('Admin.Master')

@section('title')
    <title>Add a video | Dashboard</title>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <!-- Include error message div -->
            @include('Partials.Event')

            <form action="{{ url('dashboard/video/' . $video->id . '-' . $video->slug . '/update') }}" class="form-horizontal" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title" class="col-md-3 control-label">Title</label>
                    <div class="col-md-9">
                        <input type="text" name="title" id="title" class="form-control"
                               value="{{ $video->title }}" placeholder="Title">
                    </div> <!-- div.col-md-9 -->
                </div> <!-- div.form-group -->

                <div class="form-group">
                    <label for="description" class="col-md-3 control-label">Description</label>
                    <div class="col-md-9">
                        <textarea name="description" id="description" class="form-control" placeholder="Description">{{ $video->description }}</textarea>
                    </div> <!-- div.col-md-9 -->
                </div> <!-- div.form-group -->

                <div class="form-group">
                    <label for="order_number" class="col-md-3 control-label">Order Number</label>
                    <div class="col-md-9">
                        <input type="text" name="order_number" id="order_number" class="form-control"
                               value="{{ $video->order_number }}" placeholder="Order Number">
                    </div> <!-- div.col-md-9 -->
                </div> <!-- div.form-group -->

                <div class="form-group">
                    <label for="embed_code" class="col-md-3 control-label">Embed Code</label>
                    <div class="col-md-9">
                        <input type="text" name="embed_code" id="embed_code" class="form-control"
                               value="{{ $video->embed_code }}" placeholder="Embed Code">
                    </div> <!-- div.col-md-9 -->
                </div> <!-- div.form-group -->

                <div class="form-group">
                    <div class="col-md-offset-10 col-md-2">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div> <!-- div.col-md-offset-10.col-md-2 -->
                </div> <!-- div.form-group -->
            </form> <!-- form.form-horizontal -->
        </div> <!-- /.col-md-6.col-md-offset-3 -->
    </div> <!-- /.row -->
@stop