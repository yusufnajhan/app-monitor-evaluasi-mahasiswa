@extends('layouts.main')

@section('body')
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="login-outer-container">
            <a href="{{ route('landing-page') }}" class="text-center mb-4 text-3xl font-bold">
                <img class="w-24 h-28 mx-auto mb-3"
                    src="https://seeklogo.com/images/U/universitas-diponegoro-logo-6B2C58478B-seeklogo.com.png"
                    alt="logo">
                MonEl
            </a>
            <div class="login-container">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="login-message">
                        Login ke akun Anda
                    </h1>

                    @if (session()->has('loginError'))
                        <div class="red-alert" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Perhatian!</span> {{ session('loginError') }}
                            </div>
                        </div>
                    @endif

                    @if (session()->has('logoutSuccess'))
                        <div class="green-alert" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Perhatian!</span> {{ session('logoutSuccess') }}
                            </div>
                        </div>
                    @endif

                    <form class="space-y-4 md:space-y-6" action="/login" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="form-label">
                                Email
                            </label>
                            <input type="email" name="email" id="email"
                                class="form-input"placeholder="name@company.com" value="{{ old('email') }}" autofocus>

                            @error('email')
                                <div class="red-alert" role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        <span class="font-medium">Perhatian!</span> {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="form-input">

                            @error('password')
                                <div class="red-alert" role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        <span class="font-medium">Perhatian!</span> {{ $message }}
                                    </div>
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="full-horizontal-button">
                            Login
                        </button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Belum punya akun?
                            <a href="{{ route('register') }}"
                                class="font-medium text-blue-600 hover:underline dark:text-blue-500">
                                Registrasi
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
