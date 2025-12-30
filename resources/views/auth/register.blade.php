@extends('layouts.app')

@section('title', 'Register')

@section('content')
<style>
    /* Card fade-in + slide-up */
    .fade-slide-up {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeSlideUp 0.6s forwards;
    }
    @keyframes fadeSlideUp {
        to { opacity: 1; transform: translateY(0); }
    }

    /* Material-style input */
    .input-group-outline {
        position: relative;
        margin-top: 1.5rem;
    }
    .input-group-outline input {
        width: 100%;
        border: 1px solid #ced4da;
        border-radius: 0.5rem;
        padding: 1rem 0.75rem 0.25rem 0.75rem;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: transparent;
    }
    .input-group-outline label {
        position: absolute;
        top: 0.9rem;
        left: 0.75rem;
        color: #6c757d;
        font-size: 0.85rem;
        pointer-events: none;
        transition: all 0.3s ease;
    }
    .input-group-outline input:focus {
        border-color: #343a40;
        box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.25);
    }
    .input-group-outline input:focus + label,
    .input-group-outline input:not(:placeholder-shown) + label {
        top: -0.5rem;
        left: 0.65rem;
        font-size: 0.75rem;
        color: #343a40;
        background: white;
        padding: 0 0.25rem;
    }

    /* Error text */
    .invalid-feedback {
        font-size: 0.8rem;
    }
</style>

<div class="row justify-content-center" style="min-height: 85vh; display: flex; align-items: center;">
    <div class="col-10 col-md-4 mx-auto">
        <div class="card shadow-lg border-radius-lg fade-slide-up">
            <div class="card-header bg-gradient-dark text-center py-3">
                <h4 class="text-white mb-0">Register</h4>
                <p class="text-white text-sm mb-0">Buat akun baru untuk masuk ke sistem</p>
            </div>

            <div class="card-body px-4">
                @if ($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3 position-relative">
                        <div class="input-group-outline @error('name') is-invalid @enderror">
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder=" " required>
                            <label>Nama Lengkap</label>
                        </div>
                        @error('name')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3 position-relative">
                        <div class="input-group-outline @error('email') is-invalid @enderror">
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder=" " required>
                            <label>Email</label>
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3 position-relative">
                        <div class="input-group-outline @error('password') is-invalid @enderror">
                            <input type="password" name="password" class="form-control" placeholder=" " required>
                            <label>Password</label>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3 position-relative">
                        <div class="input-group-outline">
                            <input type="password" name="password_confirmation" class="form-control" placeholder=" " required>
                            <label>Konfirmasi Password</label>
                        </div>
                    </div>

                    <button type="submit" class="btn bg-gradient-dark w-100 mb-2">Daftar</button>

                    <p class="text-center text-sm mt-2">
                        Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
