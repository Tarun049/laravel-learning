<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data List</title>
    <style>
        img{
            height: 100px;
            width: 150px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 1024px;
        }

        th,
        td {
            padding:1rem;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            font-weight: normal;
            font-size: .875rem;
            color: #666;
            background: #eee;
            /*  以下２行で見出しを固定  */
            position: sticky;
            top: 0;
        }

        img {
            width: 80px;
            display: block;
            margin: 0 auto;
            /* margin-bottom: rem; */
        }

        /* レスポンシブ対応 */
        @media(max-width: 500px) {
            .heading {
                display: none;
            }

            td {
                display: block;
            }

            .car-name {
                background: #eee;
            }
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            font-family: 'El Messiri', sans-serif;
        }
    </style>
</head>
<body>
    <center>
        <h1>
            Member list
            <br>
        </h1>
    <x-logout/>
    <x-user-profile/>
    {{-- <x-header userCompontnet="user"/> --}}


        <table border="2px solid">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No.</th>
                <th>Images</th>
                <th>Delete User</th>
                <th>Update User</th>
            </tr>
            @foreach ($users as $single_user)
                <tr>
                    <td>{{$single_user['id']}}</td>
                    <td>{{$single_user['name']}}</td>
                    <td>{{$single_user['email']}}</td>
                    <td>{{$single_user['phone']}}</td>
                    <td><img src="{{ asset('img/'.$single_user["image"]) }}" /></td>
                    <td><a href="/delete/member-user/{{$single_user['id']}}"><button>Delete</button></a></td>
                    <td><a href={{route('get_update_user', [$single_user['id']])}}><button>Update</button></a></td>
                </tr>
            @endforeach     
        </table>
        <div class="list-paginate">
            {{-- {{$users->links()}} --}}
        </div>
    </center>
</body>
</html>