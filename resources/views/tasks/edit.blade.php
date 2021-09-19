@extends('layouts.main')

@section('content')
    <h1 class="text-5xl">Edit Task</h1>
    <form action="{{route('tasks.update',['task' => $task->id])}}" method="POST">
    @csrf <!-- For send data -->
        @method('PUT')
        <div class="mb-4">
            <label for="title">title</label>
            <input type="text" class="border-2
                               @error('title') border-red-400 bg-red-200 @enderror"
                   name="title" autocomplete="off"
                   value="{{old('title',$task->title)}}">
            @error('title')
            <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="detail">detail</label>
            <input type="text" class="border-2
                               @error('detail') border-red-400 bg-red-200 @enderror"
                   name="detail" autocomplete="off"
                   value="{{old('detail',$task->detail)}}">
            @error('detail')
            <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="due_date">Due-Date</label>
            <input type="date" class="border-2
                               @error('due_date') border-red-400 bg-red-200 @enderror"
                   name="due_date" autocomplete="off"
                   value="{{old('due_date',$task->due_date->format('Y-m-d'))}}">
            @error('due_date')
            <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tags">Tags ของงาน (คั่นแต่ละ Tag ด้วย ,)</label>
            <input type="text" class="border p-2 w-full"
                   name="tags" autocomplete="off" value="{{$task->tag_names}}">
        </div>

        <div>
            <button type="submit" class="border-2 px-4 py-2 bg-blue-300 hover:bg-blue-200">
                Confirm Edit
            </button>
        </div>
    </form>

@endsection
