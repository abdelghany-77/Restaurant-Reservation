@extends('./layouts/admin')

@section('title', 'Create Category')

@section('content')
    <div class="container">
        <h1>Create a New Category</h1>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Category Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="1">Available</option>
                    <option value="0">Not Available</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>
@endsection
