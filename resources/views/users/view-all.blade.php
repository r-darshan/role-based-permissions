@extends('layout.main')

@section('main')

<table class="table">
    <thead>
        <tr>
            <th scope="col">Sr No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if ($users->count())
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}"> view </a>|
                        <a href="{{ route('users.edit', $user->id) }}"> edit </a>|
                        <a href="{{-- route('user.delete', $user->id) --}}"> delete </a></td>
                </tr>
            @endforeach
            {{ $users->links() }}
        @else
            <tr>
                <td colspan="4">No users found!</td>
            </tr>
        @endif
    </tbody>
</table>


@endsection
