@extends('layout.main')

@section('main')
    <div class="form-group mt-2">
        <label for="name">Name</label>
        <div class="form-control">
            {{ $product->name }}
        </div>
    </div>
    <div class="form-group mt-2">
        <label for="category">Category</label>
        <div class="form-control">
            {{ $product->category->name }}
        </div>
    </div>
    <div class="form-group mt-2">
        <label for="name">Description</label>
        <div class="form-control">
            {{ $product->description }}
        </div>
    </div>
    <h2 class="h2 mt-4">Images:</h2><br/>
    <div class="card-group mt-2 mb-5" style="max-width: 18rem;">
        @foreach ($product->images as $image)
            <div class="card">
                <img src="{{ asset($image->stored_at) }}" class="card-img-top" alt="...">
            </div>
        @endforeach
    </div>
@endsection
