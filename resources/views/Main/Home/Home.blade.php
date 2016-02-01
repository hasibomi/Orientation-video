@extends('Main.Master')

@section('title')
    <title>Home</title>
@stop

@section('content')
    <h3 class="page-header">Videos</h3>

    <div class="row">
        @foreach($videos as $video)
            <div class="col-md-3">
                <!-- 4:3 aspect ratio -->
                <div class="embed-responsive embed-responsive-4by3">
                    {!! $video->embed_code !!}
                </div>

                <br>

                <p>
                    <a href="{{ url('video/' . $video->id . '-' . $video->slug . '/view') }}">{{ $video->title }}</a>
                </p>
            </div>
        @endforeach
    </div>
@stop