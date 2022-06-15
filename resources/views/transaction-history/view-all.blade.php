@extends('layout.main')

@section('main')

<table class="table">
    <thead>
        <tr>
            <th scope="col">Sr No</th>
            <th scope="col">Description</th>
        </tr>
    </thead>
    <tbody>
        @if ($tHistory->count())
            @foreach ($tHistory as $record)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $record->description }}</td>
                </tr>
            @endforeach
            @else
            <tr>
                <td colspan="4">No tHistory found!</td>
            </tr>
            @endif
        </tbody>
    </table>
    {{ $tHistory->links() }}


@endsection
