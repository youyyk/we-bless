@extends('layouts.main')

@section('content')
    <h1 class="text-5xl">
        {{$task->title}}
    </h1>
    <h1 class="text-3xl">
        Information for this task
    </h1>
    <hr>
    <table class="table border-2 border-gray-500 mt-14">
        <thead>
        <tr>
            <th class="border-2">Title</th>
            <th class="border-2">Detail</th>
            <th class="border-2">Due_Date</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border-2 p-0.5">{{$task->title}}</td>
                <td class="border-2 p-0.5">{{$task->detail}}</td>
                <td class="border-2 p-0.5">{{$task->due_date->format('Y-m-d')}}</td>
            </tr>
        </tbody>
    </table>
    <div class="my-6">
        <a class="border-2 2xl:bg-yellow-500 px-4 py-1"
           href="{{route('tasks.edit',['task'=>$task])}}">
            Edit Task
        </a>
    </div>
    <div class="mt-4">
        <form action="{{route('tasks.destroy',['task' => $task])}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="border-2 px-4 py-2 bg-red-500 hover:bg-red-200">
                Delete
            </button>
            <input type="text" name="confirm" placeholder="Confirm">
        </form>
    </div>
@endsection
