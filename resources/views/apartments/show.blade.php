@extends('layouts.main')

@section('content')
    <h1 class="">
        Apartment {{$apartment->name}}
    </h1>
    <div>
        จำนวน {{$apartment->num_floor}} ชั้น
        {{$apartment->rooms->count()}}/{{$apartment->num_room}} ห้อง
</div>
<hr>
    @can('update',$apartment)
    <div class="my-4">
        <a class="border-2 bg-yellow-500 px-4 py-2"
            href="{{route('apartments.edit',['apartment' => $apartment->id])}}">
            แก้ไข
        </a>
    </div>
    @endcan
<div class="mt-4">
    <h2 class="text-3xl"> รายชื่อห้องในอพาร์ตเมนต์</h2>

    @can('update',$apartment)
    <div class="my-2">
        <a  class="px-4 py-2 bg-yellow-500 hover:bg-yellow-200"
            href="{{route('apartment.rooms.create',['apartment' => $apartment->id])}}">
            เพิ่มห้องใหม่
        </a>
    </div>
    @endcan
    <ul>
        @foreach($apartment->rooms->sortBy('floor') as $room)
            <li>
                <a  class="text-blue-700" href="{{route('rooms.show',['room' => $room->id])}}">
                    {{$room->type}}--{{$room->name}}
                </a>
                -- Floor {{$room->floor}}
            </li>
        @endforeach
    </ul>
</div>
@endsection
