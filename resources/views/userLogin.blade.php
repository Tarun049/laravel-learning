<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @livewireStyles
        <script src=""></script>
        {{-- @vite(['resources/js/custom-2.js']) --}}
    <style>
        a {
            text-decoration: none;
        }

        body {
            /* background: -webkit-linear-gradient(bottom, #f7e24f, #c381a9);  */
            background-repeat: no-repeat;
        }

        label {
            font-family: "Raleway", sans-serif;
            font-size: 11pt;
        }

        #forgot-pass {
            color: #8336b3d9;
            font-family: "Raleway", sans-serif;
            font-size: 10pt;
            margin-top: 3px;
            text-align: right;
        }

        #card {
            background: #fbfbfb;
            border-radius: 8px;
            box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
            height: 410px;
            margin: 6rem auto 8.1rem auto;
            width: 329px;
        }

        #card-content {
            padding: 12px 44px;
        }

        #card-title {
            font-family: "Raleway Thin", sans-serif;
            letter-spacing: 4px;
            padding-bottom: 23px;
            padding-top: 13px;
            text-align: center;
        }

        #signup {
            color: #8336b3d9;
            font-family: "Raleway", sans-serif;
            font-size: 10pt;
            margin-top: 16px;
            text-align: center;
        }

        #submit-btn {
            background: -webkit-linear-gradient(right, #f7e24f, #c381a9);
            border: none;
            border-radius: 21px;
            box-shadow: 0px 1px 8px #42254440;
            cursor: pointer;
            color: white;
            font-family: "Raleway SemiBold", sans-serif;
            height: 42.3px;
            margin: 0 auto;
            margin-top: 50px;
            transition: 0.25s;
            width: 153px;
        }

        #submit-btn:hover {
            box-shadow: 0px 1px 18px #b77fbb;
        }

        .form {
            align-items: left;
            display: flex;
            flex-direction: column;
        }

        .form-border {
            background: -webkit-linear-gradient(right, #fdfdfd, #d393fb);
            height: 1px;
            width: 100%;
        }

        .form-content {
            background: #fbfbfb;
            border: none;
            outline: none;
            padding-top: 14px;
        }

        .underline-title {
            background: -webkit-linear-gradient(right, #fdfdfd, #d393fb);
            height: 2px;
            margin: -1.1rem auto 0 auto;
            width: 89px;
        }

        .fail-message {
            color: #d10d17;
            background-color: #FFBABA;
            background-image: ;
            padding: 10px;
            width: initial;
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>

<body>

{{-- @foreach ($users as $single_user)
    <tr>
        <td>{{$single_user['id']}}</td>
        <td>{{$single_user['name']}}</td>
        <td>{{$single_user['email']}}</td>
        <td>{{$single_user['phone']}}</td>
        <td><img src="{{ asset('img/'.$single_user["image"]) }}" /></td>
        <td><a href="/delete/member-user/{{$single_user['id']}}"><button>Delete</button></a></td>
        <td><a href={{route('get_update_user', [$single_user['id']])}}><button>Update</button></a></td>
    </tr>
@endforeach --}}

    {{-- @livewire('counter')
    @livewire('profile') --}}
    <div id="card">

        <div id="card-content">
            @if (Session::has('fail'))
                <div class="fail-message">
                    {{ Session::get('fail') }}
                </div>
            @endif
            <div id="card-title">
                <h2>LOGIN</h2>
                <div class="underline-title"></div>
            </div>
            <form method="post" action={{ route('login_user') }} class="form">
                @csrf
                <label for="user-email" style="padding-top:13px">
                    &nbsp;Email
                </label>
                <input id="user-email" class="form-content" type="email" name="email" required />
                <div class="form-border"></div>
                <span style="color:red;font-weight:200">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
                <label for="user-password" style="padding-top:22px">&nbsp;Password
                </label>
                <input id="user-password" class="form-content" type="password" name="password" required />
                <div class="form-border"></div>
                <span style="color:red;font-weight:200">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
                <a href="#">
                    <legend id="forgot-pass">Forgot password?</legend>
                </a>
                <input id="submit-btn" type="submit" name="submit" value="LOGIN" />
                <a href="/register/request" id="signup">Don't have account yet?</a>
            </form>
        </div>
    </div>
  @livewireScripts

</body>

</html>