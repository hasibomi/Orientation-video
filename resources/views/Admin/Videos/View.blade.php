@extends('Admin.Master')

@section('title')
    <title>{{ $video->title }} - Video | Dashboard</title>
@stop

@section('content')
    <h3 class="page-header">{{ $video->title }}</h3>

    <!-- 16:9 aspect ratio -->
    <div class="embed-responsive embed-responsive-16by9">
        {!! $video->embed_code !!}
    </div>

    <br>

    <p>
        {!! $video->description !!}
    </p>

    <br>
@stop