@extends('admin.layouts.main')

@section('title')
Detail contest
@endsection

@section('content')
<h1>Đây là trang thông tin chi tiết</h1>

<p>Tên contest: {{ $data['name'] }}</p>
<p>Mô tả: {{ $data['description'] }}</p>
<p>Ảnh: </p>
<img src="{{ $_ENV['APP_URL'].$data['image'] }}" alt="">
<p>Ngày bắt đầu: {{ $data['start'] }}</p>
<p>Ngày kết thúc: {{ $data['end'] }}</p>
<p>Ngày tạo: {{ $data['created_at'] }}</p>
<p>Ngày cập nhật: {{ $data['updated_at'] }}</p>
@endsection