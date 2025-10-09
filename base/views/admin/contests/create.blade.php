@extends('admin.layouts.main')

@section('title')
Create contest
@endsection

@section('content')
<h1>Đây là trang thêm mới</h1>

<div>
    <form 
        action="/contests/store" 
        method="POST"
        enctype="multipart/form-data"
    >
        <div>
            <label for="">Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="">Description</label>
            <input type="text" name="description">
        </div>
        <div>
            <label for="">Image</label>
            <input type="file" name="image">
        </div>
        <div>
            <label for="">Start at</label>
            <input type="datetime-local" name="start">
        </div>
        <div>
            <label for="">End at</label>
            <input type="datetime-local" name="end">
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
@endsection