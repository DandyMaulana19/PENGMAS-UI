@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container py-6">
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
                        <span class="block text-xs font-normal text-blue-500">
                            detail
                        </span>
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
                <div class="shadow-md rounded-xl mb-6 p-6 w-full bg-white">
                    <h1 class="text-xl font-bold mb-6">Pengajuan Permohonan Pindah Masuk</h1>
                    <p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur esse eos et, amet
                        voluptatum
                        voluptas maiores est sunt ea quam!</p>
                    <div class="text-end">
                        <a href="" class="text-md font-semibold text-blue-600 text-end">Buat Pengajuan</a>
                    </div>
                </div>
                <div class="shadow-md rounded-xl mb-6 p-6 w-full bg-white">
                    <h1 class="text-xl font-bold mb-6">Pengajuan Surat Pindah Keluar</h1>
                    <p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur esse eos et, amet
                        voluptatum
                        voluptas maiores est sunt ea quam!</p>
                    <div class="text-end">
                        <a href="" class="text-md font-semibold text-blue-600 text-end">Buat Pengajuan</a>
                    </div>
                </div>
                <div class="shadow-md rounded-xl mb-6 p-6 w-full bg-white">
                    <h1 class="text-xl font-bold mb-6">Pengajuan Ubah Status Pekerjaan</h1>
                    <p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur esse eos et, amet
                        voluptatum
                        voluptas maiores est sunt ea quam!</p>
                    <div class="text-end">
                        <a href="" class="text-md font-semibold text-blue-600 text-end">Buat Pengajuan</a>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-4/12 h-auto">
                <div class="shadow-md rounded-xl h-full mb-6 p-6 w-full bg-white">
                    <h1 class="text-xl font-bold mb-6">Aktivitas Terkini</h1>
                </div>
            </div>

        </div>
    </div>

@endsection
