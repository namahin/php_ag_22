<h1>Customer List</h1>
{{--<a href="{{ route('customers.create') }}" class="btn btn-primary">Add Customer</a>--}}
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Contact Number</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone }}</td>
            <td>
                <a href="{{ route('customers.edit', $customer->id) }}">Edit</a>
                <form method="post" action="{{ route('customers.destroy', $customer->id) }}">
                    @csrf
                    @method('delete')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
