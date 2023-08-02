<div class="container">
    <h1>User Details</h1>
    <table class="table">
        <tbody>
        <tr>
            <th>ID</th>
            <td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Mobile</th>
            <td>{{ $user->mobile }}</td>
        </tr>
        <tr>
            <th>Verification Code</th>
            <td>{{ $user->verification_code }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $user->created_at }}</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{{ $user->updated_at }}</td>
        </tr>
        </tbody>
    </table>
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
    <form method="post" action="{{ route('users.destroy', $user->id) }}" style="display: inline-block;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this user?')">Delete
        </button>
    </form>
</div>
