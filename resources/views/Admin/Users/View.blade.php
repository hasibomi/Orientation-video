@extends('Admin.Master')

@section('title')
    <title>{{ $user->name }} | Dashboard</title>
@stop

@section('content')
    <h3 class="page-header">{{ $user->name }}</h3>

    @if(count($user->watchedVideo) > 0)
        <div class="row">
            @foreach($user->watchedVideo as $watchedVideo)
                <div class="col-md-3">
                    <!-- 4:3 aspect ratio -->
                    <div class="embed-responsive embed-responsive-4by3">
                        {!! $watchedVideo->video->embed_code !!}
                    </div>

                    <br>

                    <p>
                        <a href="{{ url('video/' . $watchedVideo->video_id . '-' . $watchedVideo->video->slug . '/view') }}">{{ $watchedVideo->video->title }}</a>
                    </p>
                </div>
            @endforeach
        </div>
    @else
        This user has not seen any video yet.
    @endif
@stop