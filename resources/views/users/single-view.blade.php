@extends('layout.main')

@section('main')
    <div class="form-group mt-2">
        <label for="name">Name</label>
        <div class="form-control">
            {{ $user->name }}
        </div>
    </div>
    <div class="form-group mt-2">
        <label for="name">Name</label>
        <div class="form-control">
            {{ $user->email }}
        </div>
    </div>

    <h2 class="h2">Permissions:</h2>
    @foreach ($user->permissions as $permission)
        <div class="form-group mt-2">
            <input type="checkbox" disabled checked/>
            <label for="{{ $permission->name }}">{{ $permission->name }}</label>
        </div>
    @endforeach

    
@endsection
