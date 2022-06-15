@extends('layout.main')

@section('main')
    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group mt-2">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name...." value="{{ $product->name }}">
            @error("name")
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="category">Category</label>
            <select type="text" name="category" id="category" class="form-control"">
                @foreach ($categories as $category)
                    <option @if ($product->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ old('name') ? old('name') : $category->name }}</option>
                @endforeach
            </select>
            @error("category")
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="name">Description</label>
            <textarea name="description" id="description" class="form-control" placeholder="description....">{{ old('description') ? old('description') : $product->description }}</textarea>
            @error("description")
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="name">Images</label>
            <input type="file" name="images[]" id="images" multiple>
            @error("images")
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mt-2">
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
    <h2 class="h2 mt-4">Images:</h2><br/>
    @foreach ($product->images as $image)
        <div class="card-group mt-2 mb-5" style="max-width: 18rem;">
            <div class="card">
                <img src="{{ asset($image->stored_at) }}" class="card-img-top" alt="...">
            </div>
        </div>
    @endforeach
@endsection
