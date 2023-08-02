<h1>Add Customer</h1>
<form method="post" action="{{ route('customers.store') }}">
    @csrf
    <label>Name: <input type="text" name="name"></label><br>
    <label>Email: <input type="email" name="email"></label><br>
    <label>Contact Number: <input type="text" name="phone"></label><br>
    <button type="submit">Save</button>
</form>
