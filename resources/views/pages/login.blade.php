@extends('layouts.template')
@section('title', 'Login')

@section('content')
    <div class="container flex min-h-screen justify-center items-center py-8">
        <div
            class="flex flex-col w-11/12 md:w-4/12 items-center text-center bg-[#F9F9F9] border border-gray-200 shadow-md rounded-xl px-10 pt-2 pb-10">
            <img src="{{ asset('assets/Logo Desa.svg') }}" width="200" class="mb-2" alt="">
            <h1 class="font-bold text-2xl">Selamat Datang!</h1>

            @if (session('success'))
                <div id="dismiss-toast"
                    class="mt-4 hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 max-w-full bg-green-600 border border-gray-200 rounded-xl shadow-lg"
                    role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label">
                    <div class="flex p-4">
                        <p id="hs-toast-dismiss-button-label" class="text-sm text-white">
                            {{ session('success') }}
                        </p>

                        <div class="ms-auto">
                            <button type="button"
                                class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-white opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100"
                                aria-label="Close" data-hs-remove-element="#dismiss-toast">
                                <span class="sr-only">Close</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div id="dismiss-toast"
                    class="mt-4 hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 max-w-full bg-red-600 border border-gray-200 rounded-xl shadow-lg"
                    role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label">
                    <div class="flex p-4">
                        @foreach ($errors->all() as $error)
                            <p id="hs-toast-dismiss-button-label" class="text-sm text-white">
                                {{ $error }}
                            </p>
                        @endforeach

                        <div class="ms-auto">
                            <button type="button"
                                class="inline-flex shrink-0 justify-center items-center size-5 rounded-lg text-white opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100"
                                aria-label="Close" data-hs-remove-element="#dismiss-toast">
                                <span class="sr-only">Close</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="w-full mt-6">
                @csrf

                <div class="mb-4 w-full text-start">
                    <label for="name" class="block text-sm font-medium mb-2 text-black">Username</label>
                    <input type="text" id="name" name="name"
                        class="py-3 px-4 block w-full bg-[#f2f2f2] border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        placeholder="Masukkan Username" value="{{ old('name') }}" required>
                </div>

                <div class="mb-6 w-full text-start">
                    <label class="block text-sm font-medium mb-2 text-black">Password</label>
                    <div class="relative">
                        <input id="hs-toggle-password" type="password" name="password"
                            class="py-3 px-4 block w-full bg-[#f2f2f2] border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            placeholder="Masukkan password" value="{{ old('password') }}">
                        <button type="button" data-hs-toggle-password='{"target": "#hs-toggle-password"}'
                            class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-[#9B1010]">
                            <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                                <path class="hs-password-active:hidden"
                                    d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"></path>
                                <path class="hs-password-active:hidden"
                                    d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                                <line class="hs-password-active:hidden" x1="2" x2="22" y1="2"
                                    y2="22"></line>
                                <path class="hidden hs-password-active:block"
                                    d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3">
                                </circle>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="block w-full text-center">
                    <button type="submit"
                        class="w-8/12 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-main text-white hover:bg-[#6a2120] disabled:opacity-50 disabled:pointer-events-none">
                        Masuk
                    </button>
                </div>

                <span class="text-sm text-center mt-6 block">Belum punya akun? <a href="{{ url('/register') }}"
                        class="text-[#9B1010]">Daftar.</a></span>
            </form>
        </div>
    </div>
@endsection
