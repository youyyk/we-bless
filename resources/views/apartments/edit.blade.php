@extends('layouts.main')

@section('content')
    <h1 class="text-5xl">แก้ไขอพาร์ตเมนต์ใหม่</h1>
    <form action="{{route('apartments.update',['apartment' => $apartment->id])}}" method="POST">
        @csrf <!-- For send data -->
        @method('PUT')
        <div class="mb-4">
            <label for="name">ชื่อ</label>
            <input type="text" class="border-2" name="name" autocomplete="off" value="{{$apartment->name}}" placeholder="ระบุชื่ออพาร์ตเมนต์">
        </div>
        <div class="mb-4">
            <label for="num_floor">จำนวนชั้น</label>
            <input type="number" class="border-2" min="1" name="num_floor" value="{{$apartment->num_floor}}"> ชั้น
        </div>
        <div class="mb-4">
            <label for="num_room">จำนวนห้อง</label>
            <input type="number" class="border-2" min="1" name="num_room" value="{{$apartment->num_room}}"> ห้อง
        </div>

        <div>
            <button type="submit" class="border-2 px-4 py-2 bg-blue-300 hover:bg-blue-200">
                แก้ไข
            </button>
        </div>
    </form>

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
            <button type="submit" class="border-2 px-4 py-2 bg-red-500 hover:bg-red-200">
                ลบ
            </button>
        </form>
    </div>
@endsection
