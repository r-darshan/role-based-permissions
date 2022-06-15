@extends('layout.main')

@section('main')
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="form-group mt-2">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name..." value="{{ old('name') ? old('name') : '' }}">
            @error('name')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email..." value="{{ old('email') ? old('email') : '' }}">
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password..." value="">
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

    
@endsection
