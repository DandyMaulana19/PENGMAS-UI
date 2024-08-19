@extends('layouts.app')

@section('title', 'Daftar Permintaan')

@section('content')
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    {{-- Cards Container --}}
    <div class=" max-w-[82rem] w-full mx-auto sm:items-center sm:justify-between  my-4 rounded h-full items-center">

        <h1 class="text-3xl font-bold text-gray-800 max-w-[82rem]  mx-auto text-start py-12">Permohonan Pindah Keluar
        </h1>

        {{-- cards --}}
        <div class="flex py-5 space-x-4 ">
            <div class="flex justify-start w-full p-3 border rounded-lg shadow-md">
                <div class="px-4 py-4 bg-[#46E02D] rounded flex items-center">
                    <box-icon name='check' color="#ffff"></box-icon>
                </div>
                <div class="inline-flex flex-col px-4">
                    <span class="font-bold text-gray-500">Disetujui</span>
                    <span class="font-bold text-gray-800">1</span>
                </div>
            </div>

            <div class="flex justify-start w-full p-3 border rounded-lg shadow-md">
                <div class="px-4 py-4 rounded bg-[#FFA426] flex items-center">
                    <box-icon name='time-five' color="#ffff"></box-icon>
                </div>
                <div class="inline-flex flex-col px-4">
                    <span class="font-bold text-gray-500">Disetujui</span>
                    <span class="font-bold text-gray-800">1</span>
                </div>
            </div>

            <div class="flex justify-start w-full p-3 border rounded-lg shadow-md">
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
    <div
        class="px-12 py-8 max-w-[82rem] w-full mx-auto sm:items-center sm:justify-between pb-5 my-4 rounded shadow-md h-full bg-white border-[#D92F2F] border-t-8 ">

        {{-- title --}}
        <h1 class="text-3xl font-bold text-[#AA0000] max-w-[82rem]  mx-auto text-start py-4 my-3">Daftar Pengajuan</h1>

        {{-- divider --}}
        <div class="mb-3 border-b-[1.8px] border-[#AA0000]"></div>

        <div class="flex items-center justify-end gap-4 my-4">
            <label for="search" class="text-sm text-gray-800 text-md">Cari :</label>
            <input type="search" class="p-2 border-2 rounded-md">
        </div>

        {{-- table --}}
        <table class="w-full mb-5 bg-white rounded">
            <thead>
                <tr class="border-2 ">
                    <th class="px-3 py-3 text-gray-800 text-start bg-[#F2F4F8]">No.</th>
                    <th class="py-3 text-gray-800 text-start bg-[#F2F4F8]">NIK</th>
                    <th class="py-3 text-gray-800 text-start bg-[#F2F4F8]">Nama Lengkap</th>
                    <th class="py-3 text-gray-800 text-start bg-[#F2F4F8]">Jenis Kelamin</th>
                    <th class="py-3 text-gray-800 text-start bg-[#F2F4F8]">Tempat Lahir</th>
                    <th class="py-3 text-gray-800 text-start bg-[#F2F4F8]">Tanggal Lahir</th>
                    <th class="py-3 text-gray-800 text-start bg-[#F2F4F8]">Agama</th>
                    <th class="py-3 text-gray-800 text-start bg-[#F2F4F8]">Pendidikan</th>
                    <th class="py-3 text-gray-800 text-start bg-[#F2F4F8]">Status</th>
                    <th class="py-3 text-gray-800 text-center bg-[#F2F4F8]">Aksi</th>
                </tr>
            </thead>

            <tbody class="">
                @foreach ($dataDummyTable as $item)
                    <tr class="border-2">
                        <td class="text-center text-md font-extralight ">{{ $loop->iteration }}</td>
                        <td class="pr-3 font-extralight text-start">{{ $item['nip'] }}</td>
                        <td class="pr-3 font-extralight text-start">{{ $item['penulis'] }}</td>
                        <td class="flex font-extralight ">{{ __('Laki-laki') }}</td>
                        <td class="font-extralight text-start">{{ $item['kontributor'] }}</td>
                        <td class="font-extralight text-start">{{ $item['prodi'] }}</td>
                        <td class="font-extralight text-start">{{ $item['tanggalupload'] }}</td>

                        <td class="font-extralight text-start">
                            {{ $item['tanggalpembaruan'] }}
                        </td>

                        <td class="font-extralight text-start">
                            {{ $item['tanggalpembaruan'] }}
                        </td>

                        <td class="flex items-center justify-center gap-2 p-2">
                            <button class="flex p-1 text-white bg-orange-500 rounded-lg hover:bg-[#AA0000]">
                                <box-icon name='show-alt' color="#fff"></box-icon>
                            </button>
                            <button class="flex p-1 text-white bg-blue-500 rounded-lg hover:bg-[#AA0000]">
                                <box-icon name='download' color='#fff'></box-icon>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

            {{-- pagination --}}
            <tfoot>
                <tr>
                    <td colspan="10" class="my-3 text-center">
                        <div class="flex items-center justify-end gap-4 pt-4">

                            <button
                                class="flex items-center justify-center p-2 text-gray-600  rounded-lg hover:bg-[#AA0000] pr-4">
                                <box-icon name='chevron-left' color="#7B7979"></box-icon>
                                Prev
                            </button>

                            <button
                                class="pr-2 p-2 w-8 text-white border rounded-lg hover:bg-[#AA0000] active:bg-orange-400 bg-[#aa0000] hover:text-white">1</button>

                            <button
                                class="pr-2 p-2 w-8  border rounded-lg hover:bg-[#AA0000] active:bg-orange-400 hover:text-white">2</button>

                            <button
                                class="flex items-center justify-center p-2 text-white bg-blue-500 rounded-lg hover:bg-[#AA0000] pl-4">
                                Next
                                <box-icon name='chevron-right' color="#fff"></box-icon>
                            </button>

                        </div>
                    </td>
                </tr>
            </tfoot>
    </div>
@endsection
