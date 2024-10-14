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
            <h4 class="mb-1 pt-2">Pendaftaran Akun Baru</h4>
            <p class="mb-4">SIlahkan Isi Form Dibawah Dengan Lengkap.</p>

            <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        value="{{ old('name') }}" name="name" autocomplete="name" placeholder="Nama Lengkap" autofocus
                        required />

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        value="{{ old('email') }}" name="email" autocomplete="email" placeholder="example.mail.com"
                        required />

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-password-toggle mb-3">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" autocomplete="new-password"
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

                <div class="form-password-toggle mb-3">
                    <label class="form-label" for="password-confirm">Ulangi Password</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password-confirm"
                            class="form-control @error('password-confirm') is-invalid @enderror"
                            name="password_confirmation" autocomplete="new-password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" required />
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div>
                </div>

                <button class="btn btn-primary d-grid w-100">Daftar</button>
            </form>

            <p class="text-center">
                <span>Sudah Punya Akun?</span>
                <a href="{{ route('login') }}">
                    <span>Login</span>
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
