{{-- edit page for product --}}
@extends('./layouts/admin')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h1>Edit Product</h1>
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
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group
                    <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
          </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
                @endforeach
                </select>
          <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
            @if ($errors->has('image'))
              <div class="invalid-feedback">
                {{ $errors->first('image') }}
              </div>
            @endif
          </div>
          <button type="submit" class="btn btn-primary">Update Product</button>
          <a href="{{ route('admin.products.index') }}" class="btn btn-secondary ml-2">Cancel</a>
          <input type="hidden" name="current_image" value="{{ asset('storage/' . $product->image) }}">
        </form>
      </div>
    </div>
    </div>
  @endsection
