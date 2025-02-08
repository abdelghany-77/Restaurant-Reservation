@extends('./layouts/admin')

@section('content')
<h2>Add New User</h2>
<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Password:</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Create</button>
</form>
@endsection
