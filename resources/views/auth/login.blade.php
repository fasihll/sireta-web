@push('assets')
    <link href="{{ asset('assets/css/authentication/form-1.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/elements/alert.css') }}">
    <style>
        .btn-light {
            border-color: transparent;
        }
    </style>
@endpush
<x-app-layout>
    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        @session('status')
                            <div class="mb-4 text-sm text-success">
                                {{ $value }}
                            </div>
                        @endsession

                        <h1 class="">Log In to <a href="index.html"><span class="brand-name">SIRETA</span></a>
                        </h1>
                        <p class="signup-link">New Here? <a href="{{ route('register') }}">Create an account</a></p>

                        @if ($errors->any())
                            <x-validation-errors />
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="text-left">
                            @csrf
                            <div class="form">

                                <div id="email-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input id="email" name="email" type="email" class="form-control"
                                        :value="old('email')" placeholder="Email" required autofocus
                                        autocomplete="username">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2">
                                        </rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="password" type="password" class="form-control"
                                        placeholder="Password" required autocomplete="current-password">
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">Show Password</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Log In</button>
                                    </div>

                                </div>

                                <div class="field-wrapper text-center keep-logged-in">
                                    <div class="n-chk new-checkbox checkbox-outline-primary">
                                        <label class="new-control new-checkbox checkbox-outline-primary">
                                            <input type="checkbox" id="remember_me" class="new-control-input"
                                                name="remember">
                                            <span class="new-control-indicator"></span>Keep me logged in
                                        </label>
                                    </div>
                                </div>

                                <div class="field-wrapper">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="forgot-pass-link">Forgot
                                            Password?</a>
                                    @endif
                                </div>

                            </div>
                        </form>
                        <p class="terms-conditions">© 2024 All Rights Reserved. <a href="index.html">Ach. Fasihul
                                Lisan</a> is a
                            Skripsi <a href="javascript:void(0);">Cookie Preferences</a>, <a
                                href="javascript:void(0);">Privacy</a>, and <a href="javascript:void(0);">Terms</a>.
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="form-image">
            <img src="{{ asset('assets/img/lightbox-1.jpg') }}" alt="" style="height: 100%;object-fit: cover">
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('assets/js/authentication/form-1.js') }}"></script>
    @endpush
</x-app-layout>
