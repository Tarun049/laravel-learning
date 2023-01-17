<center>
    <h1>
        Member list
    </h1>
    <table border="2px solid">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone No.</th>
            <th>Delete User</th>
            <th>Update User</th>
        </tr>
        @foreach ($users as $single_user)
            <tr>
                <td>{{$single_user['id']}}</td>
                <td>{{$single_user['name']}}</td>
                <td>{{$single_user['email']}}</td>
                <td>{{$single_user['phone']}}</td>
                <td><a href="/delete/member-user/{{$single_user['id']}}"><button>Delete</button></a></td>
                <td><a href="/update/member-user/{{$single_user['id']}}"><button>Update</button></a></td>
            </tr>
        @endforeach        
    </table>
    <div class="list-paginate">
        {{-- {{$users->links()}} --}}
    </div>
</center>