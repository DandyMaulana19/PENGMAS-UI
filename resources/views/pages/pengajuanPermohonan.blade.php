@extends('layouts.app')
@section('title', 'Pengajuan Permohonan Pindah Keluar')

@section('content')
    <div
        class="w-full mx-auto my-10 rounded-t-lg shadow-lg xs:max-w-xs sm:max-w-md md:max-w-lg lg:max-w-2xl xl:max-w-4xl 2xl:max-w-7xl">
        <div class="w-full h-2 bg-red-600 rounded-t-lg"></div>

        <div class="container p-10 mx-auto">
            <h2 class="mb-6 text-3xl font-bold text-red-800">Pengajuan Permohonan Pindah Keluar</h2>

            <hr class="mb-4 bg-red-600 h-0.5">

            <form>
                <h3 class="my-6 mb-4 text-2xl font-semibold">Data Diri</h3>

                @foreach ($datadiri as $data)
                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="" class="w-full md:w-1/4">No. KK</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            placeholder="Masukkan No. KK" value="{{ $data-> }}">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="" class="w-full md:w-1/4">NIK</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            placeholder="Masukkan NIK">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="" class="w-full md:w-1/4">Nama Lengkap</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            placeholder="Masukkan Nama Lengkap">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="" class="w-full md:w-1/4">Jenis Kelamin</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            placeholder="Masukkan Jenis Kelamin">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="" class="w-full md:w-1/4">Tempat Lahir</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            placeholder="Masukkan Tempat Lahir">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="" class="w-full md:w-1/4">Tanggal Lahir</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            placeholder="Masukkan Tanggal Lahir (YYYY-MM-DD)">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="" class="w-full md:w-1/4">Agama</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            placeholder="Masukkan Agama">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="" class="w-full md:w-1/4">Pendidikan</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            placeholder="Masukkan Pendidikan">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="" class="w-full md:w-1/4">Pendidikan</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            placeholder="Masukkan Pendidikan">
                    </div>
                @endforeach

                <h3 class="my-6 mb-4 text-2xl font-semibold">Data Daerah Tujuan</h3>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">Alamat</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        placeholder="Masukkan Alamat">
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">RT</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        placeholder="Masukkan RT">
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">RW</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        placeholder="Masukkan RW">
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">Desa/Kelurahan</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        placeholder="Masukkan Desa/Kelurahan">
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">Kecamatan</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        placeholder="Masukkan Kecamatan">
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">Kabupaten</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        placeholder="Masukkan Kabupaten">
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">Provinsi</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        placeholder="Masukkan Provinsi">
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">Lampiran</label>
                    <input type="file" name="" id=""
                        class="block w-full text-sm border border-gray-200 rounded-lg shadow-sm md:w-3/4 focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
                </div>

                <div class="flex justify-end mt-8">
                    <a href="{{ url('/warga/pindah-keluar') }}"
                        class="px-4 py-2 mr-2 text-gray-800 transition duration-200 bg-gray-200 rounded-md hover:bg-gray-300">Batal</a>
                    {{-- <button type="submit"
                        class="px-4 py-2 text-white transition duration-200 bg-red-600 rounded-md hover:bg-red-700">Submit</button> --}}
                    <a href="{{ url('/warga/dashboard') }}"
                        class="px-4 py-2 text-white transition duration-200 bg-red-600 rounded-md hover:bg-red-700">Submit</a>
                </div>
            </form>
        </div>
    </div>
@endsection
