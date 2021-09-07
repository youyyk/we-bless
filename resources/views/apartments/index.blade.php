@extends('layouts.main')

@section('content')
    <h1 class="text-5xl">
        รายการอพาร์ตเมนต์
    </h1>

    <div class="my-6">
        <a class="border-2 2xl:bg-green-500 px-4 py-1"
            href="{{route('apartments.create')}}}">
            + เพิ่มอพาร์ตเมนต์ใหม่
        </a>
    </div>

    <table class="table border-2 border-gray-500">
        <thead>
            <tr>
                <th class="border-2">ชื่ออพาร์ตเมนต์</th>
                <th class="border-2">จำนวนชั้น</th>
                <th class="border-2">จำนวนห้อง</th>
            </tr>
        </thead>
        <tbody>
            @foreach($apartments as $apartment)
                <tr>
                    <td class="border-2">
                        <a href="{{route('apartments.show',['apartment'=>$apartment->id])}}">
                            {{$apartment->name}}
                        </a>
                    </td>
                    <td class="border-2">{{$apartment->num_floor}}</td>
                    <td class="border-2">{{$apartment->num_room}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
