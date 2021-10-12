@extends('layouts.main')

@section('content')
    <h1>
        All Images
    </h1>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Path</th>
                <th>Preview</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
                <tr>
                    <td class="border px-3">
                        {{$image->name}}
                    </td>
                    <td class="border px-3">
                        {{$image->path}}
                    </td>
                    <td class="border px-3">
                        <img src="{{url(\Str::replace('public/','storage/',$image->path))}}">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
