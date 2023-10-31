@extends('layouts.main')

@section('body')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <a href="{{ route('landing-page') }}">
                <img class="w-24 h-28 mx-auto mb-3"
                    src="https://seeklogo.com/images/U/universitas-diponegoro-logo-6B2C58478B-seeklogo.com.png"
                    alt="logo">
            </a>
            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                MonEl
            </h1>
            <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
                Sistem Monitoring dan Evaluasi bagi warga Universitas Diponegoro
            </p>
            <a href="{{ route('login') }}"
                class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                Login
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </section>
@endsection
