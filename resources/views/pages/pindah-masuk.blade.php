@extends('layouts.app')

@section('title', 'Pindah Masuk')

@section('content')
    {{-- <div class="container py-12"> --}}
        <div class=" max-w-[82rem] w-full mx-auto sm:items-center sm:justify-between  my-4 rounded h-full items-center">
        <div class="w-full p-6 bg-white shadow-md rounded-xl">
            <h1 class="mb-6 text-2xl font-bold">Pengajuan Permohonan Pindah Masuk</h1>
            <hr class="w-full border border-[#9B1010] mb-6">
            <div class="max-w-full border border-[#9B1010] rounded-md mb-6">
                <!-- SearchBox -->
                <div class="relative"
                    data-hs-combo-box='{
                  "groupingType": "default",
                  "isOpenOnFocus": true,
                  "apiUrl": "../assets/data/searchbox.json",
                  "apiGroupField": "category",
                  "outputItemTemplate": "<div data-hs-combo-box-output-item><span class=\"flex items-center cursor-pointer py-2 px-4 w-full text-sm text-gray-800 hover:bg-gray-100"><div class=\"flex items-center w-full\"><div class=\"flex items-center justify-center rounded-full bg-gray-200 size-6 overflow-hidden me-2.5\"><img class=\"shrink-0\" data-hs-combo-box-output-item-attr=&apos;[{\"valueFrom\": \"image\", \"attr\": \"src\"}, {\"valueFrom\": \"name\", \"attr\": \"alt\"}]&apos; /></div><div data-hs-combo-box-output-item-field=\"name\" data-hs-combo-box-search-text data-hs-combo-box-value></div></div><span class=\"hidden hs-combo-box-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"></polyline></svg></span></span></div>",
                  "groupingTitleTemplate": "<div class=\"text-xs uppercase text-gray-500 m-3 mb-1"></div>"
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
            </div>

            <div class="mb-3 text-end">
                <a href="{{ url('/warga/form-tambah-data') }}"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-normal rounded-lg border bg-[#922E2C] text-white shadow-sm hover:bg-[#722423] focus:outline-none disabled:opacity-50 disabled:pointer-events-none ">Tambah
                    Data</a>
            </div>

            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden border">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">No.
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">Nama
                                            Lengkap</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">Jenis
                                            Kelamin</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">
                                            Tempat
                                            Lahir</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">
                                            Tanggal
                                            Lahir</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">Agama
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">
                                            Pendidikan</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">

                                    @foreach ($datadiri as $data)
                                        <tr>
                                            <td class="px-6 py-4 text-xs text-black whitespace-nowrap">
                                                {{ $loop->iteration }}</td>
                                            <td class="px-6 py-4 text-xs text-black whitespace-nowrap">
                                                {{ $data->namaLengkap }}</td>
                                            <td class="px-6 py-4 text-xs text-black whitespace-nowrap">
                                                {{ $data->jenisKelamin == 0 ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <td class="px-6 py-4 text-xs text-black whitespace-nowrap">
                                                {{ $data->tempatLahir }}</td>
                                            <td class="px-6 py-4 text-xs text-black whitespace-nowrap">
                                                {{ Carbon\Carbon::parse($data->tanggalLahir)->translatedFormat('d F Y') }}
                                            </td>
                                            <td class="px-6 py-4 text-xs text-black whitespace-nowrap">{{ $data->agama }}
                                            </td>
                                            <td class="px-6 py-4 text-xs text-black whitespace-nowrap">
                                                {{ $data->pendidikan }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
