@extends('layouts.main')

@section('content')
    <h1 class="text-5xl">
        แก้ไขห้อง {{$room->type}}---{{$room->name}}
    </h1>

    <form action="{{ route('rooms.update', ['room'=>$room->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="my-4">
            <label for="floor">ชั้น</label>
            <input type="number" name="floor"
                   class="border-2"
                   value="{{$room->floor}}"
                   min="1" max="{{$room->apartment->num_floor}}"
            > / {{$room->apartment->num_floor}}
        </div>
        <div class="mt-4">
            <label for="name">หมายเลขห้อง</label>
            <input type="text" name="name"
                   class="border-2"
                   value="{{$room->name}}"
            >
        </div>
        <div class="mt-4">
            <label for="type">ประเภทห้อง</label>
            <select name="type" id="type" class="border-2">
                @foreach($room_types as $type)
                    <option @if($type === $room->type) selected @endif value="{{$type}}">
                        {{$type}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-blue-400 px-4 py-2 hover:bg-blue-200">แก้ไข</button>
        </div>
    </form>
@endsection
