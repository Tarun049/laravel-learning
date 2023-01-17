<center>
    <h1>User's lists</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Profile</th>
        </tr>
        @foreach ($api as $item)
            <tr>
                <td>{{$item['id']}}</td>
                <td>{{$item['email']}}</td>
                <td>{{$item['first_name']}}</td>
                <td>{{$item['last_name']}}</td>
                <td><img src="{{$item['avatar']}}" alt=""></td>
            </tr>
        @endforeach
    </table>
</center>