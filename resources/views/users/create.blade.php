<form method="POST" action="/users/store">
    @csrf
    <label>Name:</label>
    <input type="text" name="name">

    <label>Email:</label>
    <input type="email" name="email">

    <label>Password:</label>
    <input type="password" name="password">

    <button type="submit">Create User</button>
</form>
