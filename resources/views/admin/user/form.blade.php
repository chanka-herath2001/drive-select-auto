@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        @if ($user->id)
                            Edit {{ $user->name }}
                        @else
                            Create New User
                        @endif
                    </div>
                    <div class="card-body">

                        <form action="{{ $user->id ? route('user.update', $user->id) : route('user.store') }}" method="POST">

                            @csrf
                            @if ($user->id)
                                @method('PUT')
                            @endif

                            <div class="mb-3">
                                <label for="name" class="form-label">
                                    Name
                                </label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $user->name) }}" />
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $user->email) }}" placeholder="name@example.com">
                                @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    Password
                                </label>
                                <input type="password" class="form-control" id="password" name="password" />
                                @error('password')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="role_id" class="form-label">
                                    Role
                                </label>
                                <select class="form-control" name="role_id" id="role_id">
                                    <option value="">Select Role</option>
                                    @foreach (\App\Enums\UserRole::cases() as $case)
                                        <option value="{{ $case->value }}"
                                            {{ old('role_id', $user?->role_id?->value) == $case->value ? 'selected' : '' }}>
                                            {{ $case->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
