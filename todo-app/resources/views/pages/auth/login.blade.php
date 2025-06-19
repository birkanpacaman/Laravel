@extends('layouts.app')

@section('content')
    <h1>Login</h1>

    <form action="{{ route('login.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
				</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Login</button>

    </form>

    <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>

@endsection