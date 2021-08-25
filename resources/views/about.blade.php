@extends('layouts.main')

@section('content')
    <h1>About Page</h1>
    <p>This is About Page</p>

    <p>Contact: {{$name}} ({{$info['email']}})</p>
    <p>{!! $info['address'] !!}</p>
@endsection
