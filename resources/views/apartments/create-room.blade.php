@extends('layouts.main')

@section('content')
    <h1 class="text-5xl">
        เพิ่มห้องให้อาร์พเมนต์ {{$apartment->name}}
    </h1>

    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        <input type="hidden" name="apartment_id" value="{{$apartment->id}}">
        <div class="my-4">
            <label for="floor">ชั้น</label>
            <input type="number" name="floor"
                   class="border-2 @error('floor') border-red-400 bg-red-100 @enderror"
                   value="{{old('floor',"")}}"
            > / {{$apartment->num_floor}}
            @error('floor')
                <p class="text-red-500">
                        {{$message}}
                </p>
            @enderror
        </div>
        <div class="mt-4">
            <label for="name">หมายเลขห้อง</label>
            <input type="text" name="name"
                   class="border-2 @error('name') border-red-400 bg-red-100 @enderror"
                   value="{{old('name',"")}}"
            >
            @error('name')
            <p class="text-red-500">
                {{$message}}
            </p>
            @enderror
        </div>
        <div class="mt-4">
            <label for="type">ประเภทห้อง</label>
            <select name="type" id="type" class="border-2">
                @foreach($room_types as $type)
                    <option value="{{$type}}" {{old('type') === $type ? 'selected' : ""}}>{{$type}}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-blue-400 px-4 py-2 hover:bg-blue-200">เพิ่มห้องใหม่</button>
        </div>
    </form>
@endsection
