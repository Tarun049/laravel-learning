<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        height: auto;
        margin: 1rem auto 8.1rem auto;
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
        margin-top: 10px;
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
        #user-image{
        margin-bottom: 10px;
        }
        #user_img{
            height: 50px;
            width: 50px;
            margin-top: 10px;
        }

  </style>
</head>

<body>
  {{-- @for($i =0; $i<10; $i++ ) 
    <h3>Hello user {{$i}}</h3>
  @endfor --}}
  <Center>
    {{-- <x-header userCompontnet="user"/> --}}
    <x-logout/>
    <x-user-profile/>
  </Center>
  <div id="card">
    <div id="card-content">
      <div id="card-title">
        <h2>Update User</h2>
        <div class="underline-title"></div>
      </div>
      {{-- @if( $errors->any() )
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
      @endif --}}
      <form method="post" class="form" action={{route('update_user')}} enctype="multipart/form-data">
        @csrf
        {{-- {{method_field('put')}} --}}
        <input type="hidden" name="user_id" id="user_id" value={{$userData['id']}}>
        
        <label for="user-Name" style="padding-top:13px">
            &nbsp;Name
          </label>
        <input id="user-Name" class="form-content" type="Name" value={{$userData['name']}} name="name" autocomplete="on"/>
        <div class="form-border"></div>
        <span style="color:red;font-weight:200">@error('name'){{$message}}@enderror</span>

        <label for="user-email" style="padding-top:13px">
            &nbsp;Email
          </label>
        <input id="user-email" class="form-content" type="email" value={{$userData['email']}} name="email" autocomplete="on"/>
        <div class="form-border"></div>
        <span style="color:red;font-weight:200">@error('email'){{$message}}@enderror</span>


        <label for="user-phone" style="padding-top:13px">
            &nbsp;phone
          </label>
        <input id="user-phone" class="form-content" type="number" value={{$userData['phone']}} name="phone" autocomplete="off"/>
        <div class="form-border"></div>
        <span style="color:red;font-weight:200">@error('phone'){{$message}}@enderror</span>


        <label for="user-phone" style="padding-top:13px">
          &nbsp;image
        </label>
        <img id="user_img" src="{{ asset('img/'.$userData["image"]) }}" />
        <input id="user-image" class="form-content" type="file" name="image" autocomplete="off"/>
        <div class="form-border"></div>
        <span style="color:red;font-weight:200">@error('image'){{$message}}@enderror</span>

        <label for="user-password" style="padding-top:22px">&nbsp;Password
          </label>
        <input id="user-password" class="form-content" type="password" value={{$userData['password']}} name="password" autocomplete="off"/>
        <div class="form-border"></div>
        <span style="color:red;font-weight:200">@error('password'){{$message}}@enderror</span>

        <a href="#">
          <legend id="forgot-pass"> </legend>
        </a>
        <input id="submit-btn" type="submit" name="submit" value="Update" />
        <a href="/login/request" id="signup">Already have account ?</a>
      </form>
    </div>
  </div>
</body>
</html>