<h1>Đây là trang thêm mới</h1>

<div>
    <form 
        action="/contests/update/{{ $contest['id'] }}" 
        method="POST"
        enctype="multipart/form-data"
    >
        <div>
            <label for="">Name</label>
            <input type="text" name="name" value="{{$contest['name']}}">
        </div>
        <div>
            <label for="">Description</label>
            <input type="text" name="description" value="{{$contest['description']}}">
        </div>
        <div>
            <label for="">Image</label>
            <input type="file" name="image" value="{{$contest['image']}}">
            <img src="{{ $_ENV['APP_URL'].$contest['image'] }}" alt="">
        </div>
        <div>
            <label for="">Start at</label>
            <input type="datetime-local" name="start" value="{{$contest['start']}}">
        </div>
        <div>
            <label for="">End at</label>
            <input type="datetime-local" name="end" value="{{$contest['end']}}">
        </div>
        <button type="submit">Submit</button>
    </form>
</div>