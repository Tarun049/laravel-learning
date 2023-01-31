<div class="flash">
    <form action="/flash/session" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br>
        <br>
        <label for="email">email</label>
        <input type="text" name="email" id="email">
        <br>
        <br>
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        <br>
        <br>
        <label for="image">Image</label>
        <input type="file" name="image" id="image">
        <br>
        <br>
        <input type="submit" value="submit">
    </form>

    <div class="flash-user">
        @if( Session::has('user_name') )
            <h1>Imaged saved for:- {{session('user_name')}}</h1>
        @endif
    </div>
</div>