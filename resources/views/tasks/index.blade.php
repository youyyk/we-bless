@extends('layouts.main')

@section('content')
    <h1 class="text-5xl">
        Tasks List ({{$tasks->count()}} tasks)
    </h1>

{{--    <div class="my-6">--}}
{{--        <a class="border-2 2xl:bg-green-500 px-4 py-1"--}}
{{--           href="{{route('tasks.create')}}">--}}
{{--            + Add Tasks--}}
{{--        </a>--}}
{{--    </div>--}}

    <table class="table border-2 border-gray-500 mt-5">
        <thead>
        <tr>
            <th class="border-2">#</th>
            <th class="border-2">Title</th>
            <th class="border-2">Detail</th>
            <th class="border-2">Due_Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td class="border-2 p-0.5">{{$task->id}}</td>
                <td class="border-2 p-0.5">
                    <a class="text-blue-800 hover:bg-blue-400"
                        href="{{route('tasks.show',['task'=>$task->id])}}">
                        {{$task->title}}
                    </a>
                </td>
                <td class="border-2 p-0.5">{{$task->detail}}</td>
                <td class="border-2 p-0.5">{{$task->due_date->format('Y-m-d')}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
