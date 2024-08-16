@extends('layouts.template')
@section('title', 'Login')

@section('content')
    <div class="container flex min-h-screen justify-center items-center py-8">
        <div
            class="flex flex-col w-11/12 md:w-4/12 items-center text-center bg-[#F9F9F9] border border-gray-200 shadow-md rounded-xl px-10 pt-2 pb-10">
            <img src="{{ asset('assets/Logo Desa.svg') }}" width="200" class="mb-2" alt="">
            <h1 class="font-bold text-2xl">Selamat Datang !</h1>
            {{-- <form action="" method="POST"> --}}
            <div class="mt-6 mb-10 w-full text-start">
                <label for="input-label" class="block text-sm font-medium mb-2 text-black">Username</label>
                <input type="text" id="input-label"
                    class=" mb-4 py-3 px-4 block w-full bg-[#f2f2f2] border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                    placeholder="Masukkan Username">
                <label for="input-label" class="block text-sm font-medium mb-2 text-black">Password</label>
                <input type="password" id="input-label"
                    class="py-3 px-4 block w-full bg-[#f2f2f2] border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                    placeholder="Masukkan Password">
            </div>
            <button type="button"
                class="w-8/12 py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-main text-white hover:bg-[#6a2120] disabled:opacity-50 disabled:pointer-events-none">
                Masuk
            </button>

            <span class="text-sm text-center mt-6">Belum punya akun ? <a href="{{ url('/register') }}"
                    class="text-[#9B1010]">Daftar.</a></span>
            {{-- </form> --}}
        </div>
    </div>
@endsection
