@extends('Admin.Master')

@section('title')
    <title>Videos | Dashboard</title>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/datatables/dataTables.bootstrap.min.css') }}">
@stop

@section('content')
    @include('Partials.Event')

    <a href="{{ url('dashboard/video/add') }}" class="btn btn-success">
        <span class="glyphicon glyphicon-plus"></span> Add a video
    </a>

    <h3 class="page-header">Videos | Total videos: {{ $videos->count() }}</h3>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped" id="video_table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Order Number</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($videos as $video)
                    <tr>
                        <td width="20%"><a href="{{ url('dashboard/video/' . $video->id . '-' . $video->slug . '/view') }}">{{ $video->title }}</a></td>
                        <td>{{ $video->description }}</td>
                        <td>{{ $video->order_number }}</td>
                        <td>
                            <a href="{{ url('dashboard/video/' . $video->id . '-' . $video->slug . '/edit') }}">Edit</a>
                            <a href="{{ url('dashboard/video/' . $video->id . '-' . $video->slug . '/delete') }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('js')
    <script src="{{ asset('assets/js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables/dataTables.bootstrap.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#video_table').dataTable();
        });
    </script>
@stop