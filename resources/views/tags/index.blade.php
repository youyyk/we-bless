@extends('layouts.main')

@section('content')
    <h1 class="text-5xl">
        Tags
    </h1>

    <table class="table border-2 border-gray-500 mt-5">
        <thead>
        <tr>
            <th class="border-2">Tag Name</th>
            <th class="border-2">Count Use</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td class="border-2 p-0.5">
                    <a class="text-blue-800 hover:bg-blue-400"
                       href="{{route('tags.slug',['slug'=>$tag->name])}}">
                        {{$tag->name}}
                    </a>
                </td>
                <td class="border-2 p-0.5">{{$tag->tasks->count()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

