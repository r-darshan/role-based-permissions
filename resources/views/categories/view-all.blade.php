@extends('layout.main')

@section('main')

<table class="table">
    <thead>
        <tr>
            <th scope="col">Sr No</th>
            <th scope="col">Name</th>
        </tr>
    </thead>
    <tbody>
        @if ($categories->count())
            @foreach ($categories as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                </tr>
            @endforeach
            {{ $categories->links() }}
        @else
            <tr>
                <td colspan="4">No categories found!</td>
            </tr>
        @endif
    </tbody>
</table>


@endsection
