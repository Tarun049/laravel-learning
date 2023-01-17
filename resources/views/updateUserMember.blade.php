<center>
    <H1>Update User Form</H1>
    <form action="/update/member-user" method="post">
        @csrf

        <input type="hidden" name="user_id" id="user_id" value={{$userData['id']}}>

        <label for="name">Name</label>
        <input type="text" name="name" id="name" value={{$userData['name']}}>
        <br>
        <br>
        <label for="email">email</label>
        <input type="text" name="email" id="email" value={{$userData['email']}}>
        <br>
        <br>
        <label for="phone">phone</label>
        <input type="text" name="phone" id="phone" value={{$userData['phone']}}>
        <br>
        <br>
        <label for="password">password</label>
        <input type="text" name="password" id="password" value={{$userData['password']}}>
        <br>
        <br>
        <input type="submit" value="Update">

    </form>
</center>