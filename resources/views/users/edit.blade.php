@extends('layout.main')

@section('main')
    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group mt-2">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name..." value="{{ old('name') ? old('name') : $user->name }}">
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="name">Name</label>
            <input type="text" name="email" class="form-control" placeholder="Email..." value="{{ old('email') ? old('email') : $user->email }}">
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Info</button>
        </div>
    </form>
    <h2 class="h2">Permissions:</h2>
    <form action="{{ route('user.permissions.update', $user->id) }}" method="post">
        @csrf
        @method('put')
        @foreach ($permissions as $permission)
            <div class="form-group mt-2">
                <input type="checkbox" name="permissions[{{ $permission->name }}]" id="{{ $permission->name }}"
                    {{ $user->hasPermissionTo($permission->name) ? "checked" : "" }}
                />
                <label for="{{ $permission->name }}">{{ $permission->name }}</label>
            </div>
        @endforeach

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Permissions</button>
        </div>
    </form>
    
@endsection
