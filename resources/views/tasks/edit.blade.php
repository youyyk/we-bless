@extends('layouts.main')

@section('content')
    <h1 class="text-5xl">Edit Task</h1>
    <form action="{{route('tasks.update',['task' => $task->id])}}" method="POST">
    @csrf <!-- For send data -->
        @method('PUT')
        <div class="mb-4">
            <label for="title">title</label>
            <input type="text" class="border-2" name="title" autocomplete="off" value="{{$task->title}}">
        </div>
        <div class="mb-4">
            <label for="detail">detail</label>
            <input type="text" class="border-2" name="detail" autocomplete="off" value="{{$task->detail}}">
        </div>
        <div class="mb-4">
            <label for="due_date">Due-Date</label>
            <input type="date" class="border-2" name="due_date" autocomplete="off" value="{{$task->due_date->format('Y-m-d')}}">
        </div>

        <div>
            <button type="submit" class="border-2 px-4 py-2 bg-blue-300 hover:bg-blue-200">
                แก้ไข
            </button>
        </div>
    </form>

@endsection
