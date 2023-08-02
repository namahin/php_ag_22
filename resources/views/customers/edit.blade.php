<h1>Edit Customer</h1>
<form method="post" action="{{ route('customers.update', $customer->id) }}">
    @csrf
    @method('put')
    <label>Name: <input type="text" name="name" value="{{ $customer->name }}"></label><br>
    <label>Email: <input type="email" name="email" value="{{ $customer->email }}"></label><br>
    <label>Contact Number: <input type="text" name="phone" value="{{ $customer->phone }}"></label><br>
    <!-- Add other fields as needed -->
    <button type="submit">Update</button>
</form>
