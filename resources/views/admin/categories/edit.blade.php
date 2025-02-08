{{-- edit blade page for categries --}}
@extends('./layouts/admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Edit Category</h1>
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
                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1" {{ $category->status ? 'selected' : '' }}>Available</option>
                            <option value="0" {{ !$category->status ? 'selected' : '' }}>Not Available</option>
                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary ml-2">Cancel</a>
                        </form>
                        </div>
                        </div>
                        </div>
                        @endsection

