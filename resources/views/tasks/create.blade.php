@extends('layouts.main')

@section('content')
    <h1 class="text-5xl">Create New Task</h1>
    <div class="mt-4">
        <form action="{{route('tasks.store')}}" method="POST">
        @csrf <!-- For send data -->
            <div class="mb-4">
                <label for="title">Title</label>
                <input type="text" class="border-2" name="title" autocomplete="off">
            </div>
            <div class="mb-4">
                <label for="detail">Detail</label>
                <input type="text" class="border-2" name="detail">
            </div>
            <div class="mb-4">
                <label for="due_date">Due_Date</label>
                <input type="date" class="border-2" value='<?php echo date('Y-m-d');?>' name="due_date">
            </div>

            <div class="mb-4">
                <label for="tags">Tags ของงาน (คั่นแต่ละ Tag ด้วย ,)</label>
                <input type="text" class="border p-2 w-full"
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
