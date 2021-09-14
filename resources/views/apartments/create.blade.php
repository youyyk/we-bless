@extends('layouts.main')

@section('content')
    <h1 class="text-5xl">เพิ่มอพาร์ตเมนต์ใหม่</h1>

{{--    @if($errors->any())--}}
{{--        <div class="bg-red-400 p-8 my-2">--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                <p>{{$error}}</p>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    @endif--}}

    <form action="{{route('apartments.store')}}" method="POST">
        @csrf <!-- For send data -->

        <div class="mb-4">
            <label for="name">ชื่อ</label>
            <input type="text" class="border-2
                                      @error('name') border-red-400 bg-red-200 @enderror"
                   name="name" autocomplete="off" value="{{old('name')}}"
                   placeholder="ระบุชื่ออพาร์ตเมนต์">
            @error('name')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="num_floor">จำนวนชั้น</label>
            <input type="number" class="border-2
                                      @error('num_floor') border-red-400 bg-red-200 @enderror"
                   min="1" name="num_floor" value="{{old('num_floor')}}"> ชั้น
            @error('num_floor')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="num_room">จำนวนห้อง</label>
            <input type="number" class="border-2
                                      @error('num_room') border-red-400 bg-red-200 @enderror"
                   min="1" name="num_room" value="{{old('num_room')}}"> ห้อง
            @error('num_room')
                <p class="text-red-500">{{$message}}</p>
            @enderror
        </div>

        <div>
            <button type="submit" class="border-2 px-4 py-2 bg-blue-300 hover:bg-blue-200">
                เพิ่ม
            </button>
        </div>
    </form>
@endsection
