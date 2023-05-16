@extends('app')

@section('title')
    Register Page
@endsection

@section('konten')
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="{{ asset('admin/assets/images/logo/logo.svg') }}" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Sign Up</h1>
                    <p class="auth-subtitle mb-5">
                        Input your data to register to our website.
                    </p>

                    <form method="POST" action="/register/proses">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input name="email" type="text"
                                class="form-control form-control-xl @error('email')
                            is-invalid
                            @enderror"
                                placeholder="Email" value="{{ old('email') }}">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input name="nama" type="text"
                                class="form-control form-control-xl @error('nama')
                            is-invalid
                            @enderror"
                                placeholder="Nama" value="{{ old('nama') }}">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('nama')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input name="password" type="password"
                                class="form-control form-control-xl @error('password')
                            is-invalid
                            @enderror"
                                placeholder="Password" value="{{ old('password') }}">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    <i class="bx bx-radio-circle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                            Sign Up
                        </button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">
                            Already have an account?
                            <a href="/login" class="font-bold">Log in</a>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>
@endsection
