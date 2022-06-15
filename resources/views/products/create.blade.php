@extends('layout.main')

@section('main')
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-2">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name....">
            @error("name")
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="category">Category</label>
            <select type="text" name="category" id="category" class="form-control"">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error("category")
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="name">Description</label>
            <textarea name="description" id="description" class="form-control" placeholder="description...."></textarea>
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
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>

@endsection
