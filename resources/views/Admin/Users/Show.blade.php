@extends('Admin.Master')

@section('title')
    <title>Users | Dashboard</title>
@stop

@section('content')
    <h3 class="page-header">Users | Total users: {{ $users->count() }}</h3>

    <ul>
        @foreach($users as $user)
            <li><a href="{{ url('dashboard/user/' . $user->username . '/view') }}">{{ $user->name }}</a></li>
        @endforeach
    </ul>
@stop