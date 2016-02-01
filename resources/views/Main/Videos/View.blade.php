@extends('Main.Master')

@section('title')
    <title>{{ $video->title }} - Video | Dashboard</title>
@stop

@section('content')
    @include('Partials.Event')

    <h3 class="page-header">{{ $video->title }}</h3>

    <!-- 16:9 aspect ratio -->
    <div class="embed-responsive embed-responsive-16by9">
        {!! $video->embed_code !!}
    </div>

    <br>

    <div class="row">
        <div class="col-md-12">
            <aside class="pull-right">
                @if($next->count() > 0)
                    <a href="{{ url('video/' . $next->first()->id . '-' . $next->first()->slug . '/view') }}" class="btn btn-info">Next</a>
                @endif

                @if(Auth::user())
                    @if(count($video->watchedVideo) > 0)
                        @foreach($video->watchedVideo as $watchedVideo)
                            @if($watchedVideo->user_id == Auth::user()->id)
                                <a href="{{ url('video/' . $watchedVideo->id . '-' . $video->slug . '/unwatch') }}" class="btn btn-success">Unwatch</a>
                            @else
                                <a href="{{ url('video/' . $video->id . '-' . $video->slug . '/watch') }}" class="btn btn-success">Watch</a>
                            @endif
                        @endforeach
                    @else
                        <a href="{{ url('video/' . $video->id . '-' . $video->slug . '/watch') }}" class="btn btn-success">Watch</a>
                    @endif
                @else
                    <a href="{{ url('login') }}" class="btn btn-success">Watch</a>
                @endif
            </aside>
        </div>
    </div>

    <br>

    <p>
        {!! $video->description !!}
    </p>

    <br>
@stop