@extends('layouts.app')
@section('title', 'Tambah Data')

@section('content')
    <div
        class="my-10 w-full xs:max-w-xs sm:max-w-md md:max-w-lg lg:max-w-2xl xl:max-w-4xl 2xl:max-w-7xl mx-auto shadow-lg rounded-t-lg">
        <div class="bg-red-600 w-full h-2 rounded-t-lg"></div>

        <div class="container mx-auto p-10">
            <h2 class="text-3xl font-bold text-red-800 mb-6">Tambah Data</h2>

            <hr class="mb-4 bg-red-600 h-0.5">

            <form>
                <h3 class="text-2xl font-semibold mb-4 my-6">Data Diri</h3>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">NIK</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan NIK">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Nama Lengkap</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan Nama Lengkap">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Jenis Kelamin</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan Jenis Kelamin">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Tempat Lahir</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan Tempat Lahir">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Tanggal Lahir</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan Tanggal Lahir (YYYY-MM-DD)">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Agama</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan Agama">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Pendidikan</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan Pendidikan">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Status Pekerjaan</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan Status Pekerjaan">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Nama Instansi Pekerjaan</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan Nama Instansi Pekerjaan">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Alamat Instansi Pekerjaan</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan Alamat Instansi Pekerjaan">
                </div>

                <h3 class="text-2xl font-semibold mb-4 my-6">Data Daerah Asal</h3>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Alamat</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan Alamat">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">RT</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan RT">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">RW</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan RW">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Desa/Kelurahan</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan Desa/Kelurahan">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Kecamatan</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan Kecamatan">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Kabupaten</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan Kabupaten">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Provinsi</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan Provinsi">
                </div>

                <h3 class="text-2xl font-semibold mb-4 my-6">Data Daerah Tujuan</h3>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Alamat</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan Alamat">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">RT</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan RT">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">RW</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan RW">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Desa/Kelurahan</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan Desa/Kelurahan">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Kecamatan</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan Kecamatan">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Kabupaten</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan Kabupaten">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Provinsi</label>
                    <input type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        placeholder="Masukkan Provinsi">
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="" class="w-full md:w-1/4">Lampiran</label>
                    <input type="file" name="" id=""
                        class="block w-full md:w-3/4 border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
                </div>

                <div class="mt-8 flex justify-end">
                    <a href="{{ url('/warga/pindah-masuk') }}"
                        class="px-4 py-2 mr-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition duration-200">Batal</a>
                    {{-- <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-200">Submit</button> --}}
                    <a href="{{ url('/warga/dashboard') }}"
                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-200">Submit</a>
                </div>
            </form>
        </div>
    </div>
@endsection
