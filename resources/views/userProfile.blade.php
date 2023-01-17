<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
    <style>
        .user-dashboard div{
            display: inline;
            margin: 10px;
            padding:5px;
        }
    </style>
</head>
<body>
    <div class="user-dashboard">
        <div class="home">{{__("userprofile.Home")}}</div>
        <div class="home">{{__("userprofile.About")}}</div>
        <div class="home">{{__("userprofile.Contact Us")}}</div>
    </div>

    <div class="home"><h1>{{__("userprofile.Profile Page")}}</h1></div>
    
    {{-- <h3> {{session('user_email')}}</h3> --}}
    {{-- <h3> {{session('user_email')}}</h3> --}}
    {{-- <div class="home">{{__("userprofile.Home")}}</div> --}}
{{-- 
    <table border="2px solid">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone No.</th>
        </tr>
        @foreach ($users as $single_user)
            <tr>
                <td>{{$single_user['id']}}</td>
                <td>{{$single_user['name']}}</td>
                <td>{{$single_user['email']}}</td>
                <td>{{$single_user['phone']}}</td>
            </tr>
        @endforeach        
    </table> --}}


   
    <div class="home"> <a href="/user/logout">{{__("userprofile.Logout")}}</a></div>

    <?php
    // echo "<br>";
    // echo "<br>";
    // // Get the current URL without the query string...
    // echo url()->current();
    // echo "<br>";
    // // Get the current URL including the query string...
    // echo url()->full();
    // echo "<br>";
    // // Get the full URL for the previous request...
    // echo url()->previous();
    ?>
        
</body>
</html>