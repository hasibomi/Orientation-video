@extends('Admin.Master')

@section('title')
    <title>Dashboard</title>
@stop

@section('content')
    <h3 class="page-header">Welcome {{ Auth::user()->name }}</h3>
@stop