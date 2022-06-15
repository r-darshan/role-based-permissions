@extends('layout.main')

@section('main')

<table class="table">
    <thead>
        <tr>
            <th scope="col">Sr No</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($products->count())
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        @if (Auth::user()->hasPermissionTo('products.read'))
                        <a class="btn" href="{{ route('products.show', $product->id) }}"> view </a>|
                        @endif
                        @if (Auth::user()->hasPermissionTo('products.update'))
                        <a class="btn" href="{{ route('products.edit', $product->id) }}"> edit </a>|
                        @endif
                        @if (Auth::user()->hasPermissionTo('products.delete'))
                        <form action="{{ route('products.delete', $product->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn" type="submit" > delete </button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            {{ $products->links() }}
        @else
            <tr>
                <td colspan="4">No products found!</td>
            </tr>
        @endif
    </tbody>
</table>


@endsection
