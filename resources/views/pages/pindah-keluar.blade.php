@extends('layouts.app')

@section('title', 'Pindah Keluar')

@section('content')
    {{-- <div class="container py-12"> --}}
    <div class=" max-w-[82rem] w-full mx-auto sm:items-center sm:justify-between  my-4 rounded h-full items-center">
        <div class="w-full p-6 bg-white shadow-md rounded-xl">
            <h1 class="mb-6 text-2xl font-bold">Pengajuan Permohonan Pindah Keluar</h1>
            <hr class="w-full border border-[#9B1010] mb-6">
            {{-- <div class="max-w-full border border-[#9B1010] rounded-md mb-6">
                <!-- SearchBox -->
                <div class="relative"
                    data-hs-combo-box='{
                        "groupingType": "default",
                        "isOpenOnFocus": true,
                        "apiUrl": "../assets/data/searchbox.json",
                        "apiGroupField": "category",
                        "outputItemTemplate": "<div data-hs-combo-box-output-item><span class=\"flex items-center cursor-pointer py-2 px-4 w-full text-sm text-gray-800 hover:bg-gray-100\"><div class=\"flex items-center w-full\"><div class=\"flex items-center justify-center rounded-full bg-gray-200 size-6 overflow-hidden me-2.5\"><img class=\"shrink-0\" data-hs-combo-box-output-item-attr=&apos;[{\"valueFrom\": \"image\", \"attr\": \"src\"}, {\"valueFrom\": \"name\", \"attr\": \"alt\"}]&apos; /></div><div data-hs-combo-box-output-item-field=\"name\" data-hs-combo-box-search-text data-hs-combo-box-value></div></div><span class=\"hidden hs-combo-box-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg></span></span></div>",
                        "groupingTitleTemplate": "<div class=\"text-xs uppercase text-gray-500 m-3 mb-1\"></div>"
                    }'>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                            <svg class="text-gray-400 shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.3-4.3"></path>
                            </svg>
                        </div>
                        <input
                            class="py-3 ps-10 pe-4 block w-full border-[#9B1010] rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            type="text" role="combobox" aria-expanded="false" placeholder="Masukkan nomor KK"
                            value="" data-hs-combo-box-input="">
                    </div>

                    <!-- SearchBox Dropdown -->
                    <div class="absolute z-50 w-full bg-white border border-[#9B1010] rounded-lg" style="display: none;"
                        data-hs-combo-box-output="">
                        <div class="max-h-72 rounded-b-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300"
                            data-hs-combo-box-output-items-wrapper=""></div>
                    </div>
                    <!-- End SearchBox Dropdown -->
                </div>
                <!-- End SearchBox -->
            </div> --}}

            <div class="flex flex-col">
                <table id="dataDiriTable" class="min-w-full hover ">
                    <thead class="bg-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">
                                No.</th>
                            <th scope="col" class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">
                                Nama
                                Lengkap</th>
                            <th scope="col" class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">
                                Jenis
                                Kelamin</th>
                            <th scope="col" class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">
                                Tempat
                                Lahir</th>
                            <th scope="col" class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">
                                Tanggal
                                Lahir</th>
                            <th scope="col" class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">
                                Agama
                            </th>
                            <th scope="col" class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">
                                Pendidikan</th>
                            <th scope="col" class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            $('#dataDiriTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('data-diri.pindahKeluar') }}',
                    type: 'GET',
                    dataSrc: 'data',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'namaLengkap',
                        name: 'namaLengkap'
                    },
                    {
                        data: 'jenisKelamin',
                        name: 'jenisKelamin'
                    },
                    {
                        data: 'tempatLahir',
                        name: 'tempatLahir'
                    },
                    {
                        data: 'tanggalLahir',
                        name: 'tanggalLahir'
                    },
                    {
                        data: 'agama',
                        name: 'agama'
                    },
                    {
                        data: 'pendidikan',
                        name: 'pendidikan'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endpush
