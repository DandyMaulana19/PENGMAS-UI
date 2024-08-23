@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    {{-- <div class="container px-8 py-6"> --}}
    <div class=" max-w-[82rem] w-full mx-auto sm:items-center sm:justify-between  my-4 rounded h-full items-center">

        @if (session('success'))
            <div id="dismiss-toast"
                class="max-w-full my-4 transition duration-300 bg-green-600 border border-gray-200 shadow-lg hs-removing:translate-x-5 hs-removing:opacity-0 rounded-xl"
                role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label">
                <div class="flex p-4">
                    <p id="hs-toast-dismiss-button-label" class="text-sm text-white">
                        {{ session('success') }}
                    </p>

                    <div class="ms-auto">
                        <button type="button"
                            class="inline-flex items-center justify-center text-white rounded-lg opacity-50 shrink-0 size-5 hover:opacity-100 focus:outline-none focus:opacity-100"
                            aria-label="Close" data-hs-remove-element="#dismiss-toast">
                            <span class="sr-only">Close</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        <div class="w-full p-6 mb-6 bg-white shadow-md rounded-xl">
            <h1 class="mb-6 text-xl font-bold">Progress Laporan</h1>
            {{-- <h1 class="mb-6 text-xl font-bold">Progress Laporan ( Surat Pindah Masuk )</h1> --}}

            <ul class="relative flex flex-row max-w-6xl mx-auto gap-x-2">
                <li class="flex-1 shrink basis-0 group">
                    <div class="inline-flex items-center w-full text-xs align-middle min-w-7 min-h-7">
                        @if ($currentStatus == 'RT')
                            <span
                                class="flex items-center justify-center font-medium text-white bg-red-800 rounded-full size-7 shrink-0">
                                1
                            </span>
                        @else
                            <span
                                class="flex items-center justify-center font-medium text-white bg-gray-100 rounded-full size-7 shrink-0">
                                1
                            </span>
                        @endif
                        <div class="flex-1 w-full h-px bg-gray-200 ms-2 group-last:hidden"></div>
                    </div>
                    <div class="mt-3">
                        <span class="block font-semibold text-black text-md">
                            RT
                        </span>
                    </div>
                    {{-- <div class="mt-1">
                        <a href="{{ url('/warga/detail-pindah-masuk') }}" class="block text-xs font-normal text-blue-500">
                            detail
                        </a>
                    </div> --}}
                </li>

                <li class="flex-1 shrink basis-0 group">
                    <div class="inline-flex items-center w-full text-xs align-middle min-w-7 min-h-7">
                        @if ($currentStatus == 'RW')
                            <span
                                class="flex items-center justify-center font-medium text-white bg-red-800 rounded-full size-7 shrink-0">
                                2
                            </span>
                        @else
                            <span
                                class="flex items-center justify-center font-medium text-white bg-gray-100 rounded-full size-7 shrink-0">
                                2
                            </span>
                        @endif
                        <div class="flex-1 w-full h-px bg-gray-200 ms-2 group-last:hidden"></div>
                    </div>
                    <div class="mt-3">
                        <span class="block font-semibold text-black text-md">
                            RW
                        </span>
                    </div>
                </li>

                <li class="flex-1 shrink basis-0 group">
                    <div class="inline-flex items-center w-full text-xs align-middle min-w-7 min-h-7">
                        @if ($currentStatus == 'Kelurahan')
                            <span
                                class="flex items-center justify-center font-medium text-white bg-red-800 rounded-full size-7 shrink-0">
                                3
                            </span>
                        @else
                            <span
                                class="flex items-center justify-center font-medium text-white bg-gray-100 rounded-full size-7 shrink-0">
                                3
                            </span>
                        @endif
                        <div class="flex-1 w-full h-px bg-gray-200 ms-2 group-last:hidden"></div>
                    </div>
                    <div class="mt-3">
                        <span class="block font-semibold text-black text-md">
                            Kelurahan
                        </span>
                    </div>
                </li>

                <li class="flex-1 shrink basis-0 group">
                    <div class="inline-flex items-center w-full text-xs align-middle min-w-7 min-h-7">
                        @if ($currentStatus == 'Kecamatan')
                            <span
                                class="flex items-center justify-center font-medium text-white bg-red-800 rounded-full size-7 shrink-0">
                                4
                            </span>
                        @else
                            <span
                                class="flex items-center justify-center font-medium text-white bg-gray-100 rounded-full size-7 shrink-0">
                                4
                            </span>
                        @endif
                        <div class="flex-1 w-full h-px bg-gray-200 ms-2 group-last:hidden"></div>
                    </div>
                    <div class="mt-3">
                        <span class="block font-semibold text-black text-md">
                            Kecamatan
                        </span>
                    </div>
                </li>
            </ul>

        </div>

        {{-- Second Start --}}
        <div class="flex-row w-full gap-4 md:flex">
            <div class="w-full md:w-8/12">
                <div class="flex w-full gap-4 p-6 mb-6 bg-white shadow-md rounded-xl">
                    <img src="{{ asset('assets/icon-pindah-masuk.svg') }}" alt="">
                    <div class="">
                        <h1 class="mb-6 text-xl font-bold">Pengajuan Permohonan Pindah Masuk</h1>
                        <p class="mb-2">Pengajuan Permohonan Pindah Masuk adalah proses administrasi yang memungkinkan
                            penduduk untuk secara resmi mengajukan permohonan untuk pindah ke wilayah desa Panjunan.</p>
                        <div class="text-end">
                            <button type="button" class="text-md font-semibold text-[#9B1010] text-end"
                                aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-small-modal"
                                data-hs-overlay="#hs-small-modal">Buat
                                Pengajuan</button>
                        </div>
                        <div id="hs-small-modal"
                            class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
                            role="dialog" tabindex="-1" aria-labelledby="hs-small-modal-label">
                            <div
                                class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-lg sm:w-full sm:mx-auto">
                                <div class="flex flex-col bg-white border shadow-sm pointer-events-auto rounded-xl">
                                    <div class="flex justify-end px-4 py-3 ">
                                        <button type="button"
                                            class="inline-flex items-center justify-center text-gray-800 bg-white border border-transparent rounded-full size-8 gap-x-2 hover:bg-gray-100 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                                            aria-label="Close" data-hs-overlay="#hs-small-modal">
                                            <span class="sr-only">Close</span>
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="p-4 py-0 overflow-y-auto">
                                        <p class="text-2xl font-semibold text-center text-black ">
                                            Pilih Menu
                                        </p>
                                        <div class="flex justify-center">
                                            <hr class="border border-[#922E2C] w-2/12">
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-center px-6 py-5 gap-x-2">
                                        <a href="{{ url('/warga/pindah-masuk/' . $user->id) }}" type="button"
                                            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-normal rounded-lg border bg-[#922E2C] text-white hover:bg-[#722423] focus:outline-none disabled:opacity-50 disabled:pointer-events-none ">
                                            Numpang KK
                                        </a>
                                        <a href="{{ url('/warga/form-kk-baru/' . $user->id) }}" type="button"
                                            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-normal rounded-lg border bg-[#922E2C] text-white hover:bg-[#722423] focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
                                            Buat KK Baru
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex w-full gap-4 p-6 mb-6 bg-white shadow-md rounded-xl">
                    <img src="{{ asset('assets/icon-pindah-keluar.svg') }}" alt="">
                    <div class="">
                        <h1 class="mb-6 text-xl font-bold">Pengajuan Permohonan Pindah Keluar</h1>
                        <p class="mb-2">Pengajuan Permohonan Pindah Keluar adalah proses administrasi yang memungkinkan
                            penduduk untuk secara resmi mengajukan permohonan untuk pindah dari desa Panjunan ke lokasi
                            baru..</p>
                        <div class="text-end">
                            <a href="{{ url('/warga/pindah-keluar/' . $user->id) }}"
                                class="text-md font-semibold text-[#9B1010] text-end">Buat Pengajuan</a>
                        </div>
                    </div>
                </div>
                <div class="flex w-full gap-4 p-6 mb-6 bg-white shadow-md rounded-xl">
                    <img src="{{ asset('assets/icon-ubah-pekerjaan.svg') }}" alt="">
                    <div class="">
                        <h1 class="mb-6 text-xl font-bold">Pengajuan Ubah Status Pekerjaan</h1>
                        <p class="mb-2">Pengajuan Ubah Status Pekerjaan adalah proses administratif yang memungkinkan
                            penduduk untuk mengajukan perubahan status pekerjaan mereka secara resmi.</p>
                        <div class="text-end">
                            <a href="{{ url('/warga/ubah-pekerjaan/' . $user->id) }}"
                                class="text-md font-semibold text-[#9B1010] text-end">Buat Pengajuan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full h-auto md:w-4/12">
                <div class="w-full h-full p-6 mb-6 bg-white shadow-md rounded-xl">
                    <h1 class="mb-6 text-xl font-bold">Aktivitas Terkini</h1>
                    <hr class="border-[#9B1010] border mb-6">

                    @foreach ($aktifitas as $item)
                        <div class="mb-2">
                            <h2 class="mb-2 font-semibold">
                                Permohonan {{ $item->jenis }} anda telah {{ $item->statusKeputusan }} oleh
                                {{ $item->created_by }}
                            </h2>
                            <p class="text-xs font-normal">
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y - H:i') }} WIB
                            </p>
                        </div>
                        <hr class="mb-2 border">
                    @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection
