@extends('layouts.main')

@section('content')
    <h1>
        Upload Image
    </h1>

    <form action="{{route('images.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="image">
                Select
            </label>
            <input type="file" name="image">
        </div>

        <div>
            <button type="submit">
                Upload
            </button>
        </div>
    </form>
@endsection
