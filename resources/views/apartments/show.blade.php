@extends('layouts.main')

@section('content')
    <h1 class="">
        Apartment {{$apartment->name}}
    </h1>
    <div>
        จำนวน {{$apartment->num_floor}} ชั้น
        {{$apartment->num_room}} ห้อง
    </div>
    <hr>
    <div>
        <a class=""
            href="{{route('apartments.edit',['apartment' => $apartment->id])}}">
            แก้ไข
        </a>
    </div>

    <hr>
    <div class="mt-4">
        <h2>DANGER ZONE</h2>
        <form action="{{route('apartments.destroy',['apartment' => $apartment->id])}}" method="POST">
            @method('DELETE')
            @csrf
            <p>การลบ ไม่สามารถกู้คืนได้</p>
            <div>
                <label for="destroy">ใส่ชื่ออพาร์จเมนต์เพื่อยืนยันการลบ</label>
                <input type="text" name="name">
            </div>
            <button type="submit" class="border-2 px-4 py-2 bg-blue-300 hover:bg-blue-200">
                ลบ
            </button>
        </form>
    </div>
@endsection
