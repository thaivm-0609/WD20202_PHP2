
<div>
    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Start time</th>
            <th>End time</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($data as $contest) 
            <tr>
                <td> {{ $contest['id'] }} </td>
                <td> {{ $contest['name'] }} </td>
                <td> {{ $contest['description'] }} </td>
                <td> {{ $contest['start'] }} </td>
                <td> {{ $contest['end'] }} </td>
                <td> {{ $contest['created_at'] }} </td>
                <td> {{ $contest['updated_at'] }} </td>
                <td>
                    <a href="/contests/detail/{{ $contest['id'] }}">Detail</a>
                    <a href="/contests/edit/{{ $contest['id'] }}">Edit</a>
                    <a 
                        href="/contests/delete/{{ $contest['id'] }}"
                        onclick="return confirm('Bạn có chắc chắn không?')"
                    >
                        Delete
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>