
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>