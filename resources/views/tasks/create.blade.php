@extends('layouts.main')

@section('content')
    <h1 class="text-5xl">Create New Task</h1>
    <div class="mt-4">
        <form action="{{route('tasks.store')}}" method="POST">
        @csrf <!-- For send data -->
            <div class="mb-4">
                <label for="title">Title</label>
                <input type="text" class="border-2
                                   @error('title') border-red-400 bg-red-200 @enderror"
                       value="{{old('title')}}"
                       name="title" autocomplete="off">
                @error('title')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="detail">Detail</label>
                <input type="text" class="border-2
                                   @error('detail') border-red-400 bg-red-200 @enderror"
                       value="{{old('detail')}}"
                       name="detail">
                @error('detail')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="due_date">Due_Date</label>
                <input type="date" class="border-2
                                   @error('due_date') border-red-400 bg-red-200 @enderror"
{{--                       value='<?php echo date('Y-m-d');?>'--}}
                       value="{{old('due_date')}}"
                       name="due_date">
                @error('due_date')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tags">Tags ของงาน (คั่นแต่ละ Tag ด้วย ,)</label>
                <input type="text" class="border p-2 w-full"
                       value="{{old('tags')}}"
                       name="tags" autocomplete="off">
            </div>

            <div>
                <button type="submit" class="border-2 px-4 py-2 bg-blue-300 hover:bg-blue-200">
                    Add New Task
                </button>
            </div>
        </form>
    </div>
@endsection
