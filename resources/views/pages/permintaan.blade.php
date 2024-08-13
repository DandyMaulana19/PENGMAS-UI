@extends('layouts.app')

@section('title', 'Daftar Permintaan')

@section('content')
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    {{-- Cards Container --}}
    <div class="flex justify-center mt-4 item-center">
        {{-- cards --}}
        <div class="flex space-x-4">
            <div class="flex items-center justify-center p-3 border rounded-lg shadow-md">
                <div class="px-4 py-4 bg-[#46E02D] rounded flex items-center">
                    <box-icon name='check' color="#ffff"></box-icon>
                </div>
                <div class="inline-flex flex-col px-4">
                    <span class="font-bold text-gray-500">Disetujui</span>
                    <span class="font-bold text-gray-800">1</span>
                </div>
            </div>

            <div class="flex items-center justify-center p-3 border rounded-lg shadow-md">
                <div class="px-4 py-4 rounded bg-[#FFA426] flex items-center">
                    <box-icon name='time-five' color="#ffff"></box-icon>
                </div>
                <div class="inline-flex flex-col px-4">
                    <span class="font-bold text-gray-500">Disetujui</span>
                    <span class="font-bold text-gray-800">1</span>
                </div>
            </div>

            <div class="flex items-center justify-center p-3 border rounded-lg shadow-md">
                <div class="px-4 py-4 bg-[#FC544B] rounded flex items-center">
                    <box-icon name='message-alt-x' color="#ffff"></box-icon>
                </div>
                <div class="inline-flex flex-col px-4">
                    <span class="font-bold text-gray-500">Disetujui</span>
                    <span class="font-bold text-gray-800">1</span>
                </div>
            </div>
        </div>
    </div>

    {{-- table container --}}
    <div class="px-4">
        {{-- titile --}}
        <h1 class="text-3xl font-semibold text-red-800">Daftar Penelitian</h1>

        {{-- divider --}}
        <div class="my-4 border-b-2 border-gray-300"></div>

        {{-- table --}}
        <table class="w-full bg-white rounded">
            <thead>
                <tr>
                    <th class="py-3 text-center text-gray-800 rounded-ss-lg bg-zinc-300">No</th>
                    <th class="px-3 py-3 text-gray-800 text-start bg-zinc-300">NIP</th>
                    <th class="py-3 text-gray-800 text-start bg-zinc-300">Penulis</th>
                    <th class="py-3 text-gray-800 text-start bg-zinc-300">Judul Penelitian</th>
                    <th class="py-3 text-gray-800 text-start bg-zinc-300">Kontributor/Anggota</th>
                    <th class="py-3 text-gray-800 text-start bg-zinc-300">Program Studi</th>
                    <th class="py-3 text-gray-800 text-start bg-zinc-300">Tanggal Upload</th>
                    <th class="py-3 text-gray-800 text-start bg-zinc-300">Tanggal Perbaruan</th>
                    <th class="py-3 text-center text-gray-800 rounded-se-lg bg-zinc-300">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td class="text-start">Penelitian 1</td>
                    <td class="text-start">Peneliti 1</td>
                    <td class="text-start">Disetujui</td>
                    <td class="text-start">Disetujui</td>
                    <td class="text-start">Disetujui</td>
                    <td class="text-start">Disetujui</td>
                    <td class="text-start">Disetujui</td>
                    <td class="flex items-center justify-center p-2">
                        <button class="px-4 py-2 text-white bg-blue-500 rounded-lg ">Detail</button>
                    </td>
                </tr>

            </tbody>
    </div>
@endsection
