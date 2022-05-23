<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>AVTAR</th>
            <th>ADDRESS</th>
            <th>CITY</th>
            <th>COUNTRY</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->UserDetail->user_image }}</td>
                <td>{{ $user->UserDetail->address }}</td>
                <td>{{ $user->UserDetail->city }}</td>
                <td>{{ $user->UserDetail->country }}</td>
            </tr>
        @endforeach
    </tbody>
</table>