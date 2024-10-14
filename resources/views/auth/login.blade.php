@extends('layouts.auth.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center mb-4 mt-2">
                <a href="#" class="app-brand-link gap-2">
                    <img src="{{ asset('assets/img/logo.png') }}" width="60" height="60" alt="AyasyaTech">
                    <span class="app-brand-text demo text-body fw-bold ms-1">AyasyaTech</span>
                </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-1 pt-2">Selamat Datang! 👋</h4>
            <p class="mb-4">Silahkan Login Terlebih dahulu.</p>

            <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" autocomplete="email" placeholder="example.mail.com"
                        autofocus required />

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-password-toggle mb-3">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password</label>
                        {{-- <a href="{{ route('password.request') }}">
                            <small>Forgot Password?</small>
                        </a> --}}
                    </div>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" autocomplete="current-password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" required />
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember"
                            {{ old('remember') ? 'checked' : '' }} />
                        <label class="form-check-label" for="remember"> Remember Me </label>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                </div>
            </form>

            <p class="text-center">
                <span>Belum Punya Akun?</span>
                <a href="{{ route('register') }}">
                    <span>Buat Akun Baru</span>
                </a>
            </p>

            {{-- <div class="divider my-4">
                <div class="divider-text">or</div>
            </div>

            <div class="d-flex justify-content-center">
                <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                    <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
                </a>

                <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                    <i class="tf-icons fa-brands fa-google fs-5"></i>
                </a>

                <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                    <i class="tf-icons fa-brands fa-twitter fs-5"></i>
                </a>
            </div> --}}
        </div>
    </div>
@endsection
