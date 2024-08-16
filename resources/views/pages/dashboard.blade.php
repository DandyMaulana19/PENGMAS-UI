@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container px-8 py-6">
        <div class="shadow-md rounded-xl mb-6 p-6 w-full bg-white">
            <h1 class="text-xl font-bold mb-6">Progress Laporan ( Surat Pindah Masuk )</h1>

            <ul class="relative flex flex-row gap-x-2 max-w-6xl mx-auto">
                <li class="shrink basis-0 flex-1 group">
                    <div class="min-w-7 min-h-7 w-full inline-flex items-center text-xs align-middle">
                        <span
                            class="size-7 flex justify-center items-center shrink-0 bg-red-800 font-medium text-white rounded-full">
                            1
                        </span>
                        <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden"></div>
                    </div>
                    <div class="mt-3">
                        <span class="block text-md font-semibold text-black">
                            RT
                        </span>
                    </div>
                    <div class="mt-1">
                        <a href="{{ url('/warga/detail-pindah-masuk') }}" class="block text-xs font-normal text-blue-500">
                            detail
                        </a>
                    </div>
                </li>

                <li class="shrink basis-0 flex-1 group">
                    <div class="min-w-7 min-h-7 w-full inline-flex items-center text-xs align-middle">
                        <span
                            class="size-7 flex justify-center items-center shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full">
                            2
                        </span>
                        <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden"></div>
                    </div>
                    <div class="mt-3">
                        <span class="block text-md font-semibold text-black">
                            RW
                        </span>
                    </div>
                </li>

                <li class="shrink basis-0 flex-1 group">
                    <div class="min-w-7 min-h-7 w-full inline-flex items-center text-xs align-middle">
                        <span
                            class="size-7 flex justify-center items-center shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full">
                            3
                        </span>
                        <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden"></div>
                    </div>
                    <div class="mt-3">
                        <span class="block text-md font-semibold text-black">
                            Kelurahan
                        </span>
                    </div>
                </li>

                <li class="shrink basis-0 flex-1 group">
                    <div class="min-w-7 min-h-7 w-full inline-flex items-center text-xs align-middle">
                        <span
                            class="size-7 flex justify-center items-center shrink-0 bg-gray-100 font-medium text-gray-800 rounded-full">
                            3
                        </span>
                        <div class="ms-2 w-full h-px flex-1 bg-gray-200 group-last:hidden"></div>
                    </div>
                    <div class="mt-3">
                        <span class="block text-md font-semibold text-black">
                            Kecamatan
                        </span>
                    </div>
                </li>
            </ul>

        </div>

        {{-- Second Start --}}
        <div class="flex-row md:flex w-full gap-4">
            <div class=" w-full md:w-8/12">
                <div class="flex gap-4 shadow-md rounded-xl mb-6 p-6 w-full bg-white">
                    <img src="{{ asset('assets/icon-pindah-masuk.svg') }}" alt="">
                    <div class="">
                        <h1 class="text-xl font-bold mb-6">Pengajuan Permohonan Pindah Masuk</h1>
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
                                class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                                    <div class="flex justify-end py-3 px-4 ">
                                        <button type="button"
                                            class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-white text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
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
                                        <p class=" text-black text-center font-semibold text-2xl">
                                            Pilih Menu
                                        </p>
                                        <div class="flex justify-center">
                                            <hr class="border border-[#922E2C] w-2/12">
                                        </div>
                                    </div>
                                    <div class="flex justify-center items-center gap-x-2 py-5 px-6">
                                        <a href="{{ url('/warga/pindah-masuk') }}" type="button"
                                            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-normal rounded-lg border bg-[#922E2C] text-white hover:bg-[#722423] focus:outline-none disabled:opacity-50 disabled:pointer-events-none ">
                                            Numpang KK
                                        </a>
                                        <a href="{{ url('/warga/form-kk-baru') }}" type="button"
                                            class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-normal rounded-lg border bg-[#922E2C] text-white hover:bg-[#722423] focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
                                            Buat KK Baru
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex gap-4 shadow-md rounded-xl mb-6 p-6 w-full bg-white">
                    <img src="{{ asset('assets/icon-pindah-keluar.svg') }}" alt="">
                    <div class="">
                        <h1 class="text-xl font-bold mb-6">Pengajuan Permohonan Pindah Keluar</h1>
                        <p class="mb-2">Pengajuan Permohonan Pindah Keluar adalah proses administrasi yang memungkinkan
                            penduduk untuk secara resmi mengajukan permohonan untuk pindah dari desa Panjunan ke lokasi
                            baru..</p>
                        <div class="text-end">
                            <a href="{{ url('/warga/pindah-keluar') }}"
                                class="text-md font-semibold text-[#9B1010] text-end">Buat Pengajuan</a>
                        </div>
                    </div>
                </div>
                <div class="flex gap-4 shadow-md rounded-xl mb-6 p-6 w-full bg-white">
                    <img src="{{ asset('assets/icon-ubah-pekerjaan.svg') }}" alt="">
                    <div class="">
                        <h1 class="text-xl font-bold mb-6">Pengajuan Ubah Status Pekerjaan</h1>
                        <p class="mb-2">Pengajuan Ubah Status Pekerjaan adalah proses administratif yang memungkinkan
                            penduduk untuk mengajukan perubahan status pekerjaan mereka secara resmi.</p>
                        <div class="text-end">
                            <a href="{{ url('/warga/ubah-pekerjaan') }}"
                                class="text-md font-semibold text-[#9B1010] text-end">Buat Pengajuan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-4/12 h-auto">
                <div class="shadow-md rounded-xl h-full mb-6 p-6 w-full bg-white">
                    <h1 class="text-xl font-bold mb-6">Aktivitas Terkini</h1>
                    <hr class="border-[#9B1010] border mb-6">
                    <div class="mb-2">
                        <h2 class="font-semibold mb-2">
                            Permohonan pindah masuk anda telah diterima oleh RT
                        </h2>
                        <p class="text-xs font-normal">15 Aug 2024 - 17:00 WIB</p>
                    </div>
                    <hr class="border mb-2">
                    <div class="mb-2">
                        <h2 class="font-semibold mb-2">
                            Anda telah mengajukan permohonan pindah Masuk
                        </h2>
                        <p class="text-xs font-normal">14 Aug 2024 - 17:00 WIB</p>
                    </div>
                    <hr class="border">
                </div>
            </div>

        </div>
    </div>

@endsection
