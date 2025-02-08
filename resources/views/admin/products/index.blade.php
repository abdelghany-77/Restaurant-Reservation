@extends('./layouts/admin')
@section('title', 'Products')
@section('content')
  <div class="container">
    <h1>Products</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add New Product</a>
    <table class="table mt-3">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Category</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>${{ $product->price }}</td>
            <td>{{ $product->category->name }}</td>
            <td>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="50">
                @else
                    <img src="{{ asset('images/default.png') }}" alt="No Image" width="50">
                @endif
            </td>

            <td>
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
