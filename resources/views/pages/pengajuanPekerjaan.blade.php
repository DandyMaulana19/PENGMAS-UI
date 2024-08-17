@extends('layouts.app')
@section('title', 'Pengajuan Ubah Status Pekerjaan')

@section('content')
    <div
        class="my-10 w-full xs:max-w-xs sm:max-w-md md:max-w-lg lg:max-w-2xl xl:max-w-4xl 2xl:max-w-7xl mx-auto shadow-lg rounded-t-lg">
        <div class="bg-red-600 w-full h-2 rounded-t-lg"></div>

        <div class="container mx-auto p-10">
            <h2 class="text-3xl font-bold text-red-800 mb-6">Pengajuan Ubah Status Pekerjaan</h2>

            <hr class="mb-4 bg-red-600 h-0.5">

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="uuid" value="{{ $dataDiri->uuid }}">

                <h3 class="text-2xl font-semibold mb-4 my-6">Data Diri</h3>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="nik" class="w-full md:w-1/4">NIK</label>
                    <input type="text" id="nik" name="nik"
                        class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg" value="{{ $dataDiri->nik }}"
                        readonly>
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="nama_lengkap" class="w-full md:w-1/4">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap"
                        class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        value="{{ $dataDiri->namaLengkap }}" readonly>
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="jenis_kelamin" class="w-full md:w-1/4">Jenis Kelamin</label>
                    <input type="text" id="jenis_kelamin" name="jenis_kelamin"
                        class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        value="{{ $dataDiri->jenisKelamin == 0 ? 'Laki-laki' : 'Perempuan' }}" readonly>
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="tempat_lahir" class="w-full md:w-1/4">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir"
                        class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        value="{{ $dataDiri->tempatLahir }}" readonly>
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="tanggal_lahir" class="w-full md:w-1/4">Tanggal Lahir</label>
                    <input type="text" id="tanggal_lahir" name="tanggal_lahir"
                        class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        value="{{ \Carbon\Carbon::parse($dataDiri->tanggalLahir)->format('d F Y') }}" readonly>
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="agama" class="w-full md:w-1/4">Agama</label>
                    <input type="text" id="agama" name="agama"
                        class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg" value="{{ $dataDiri->agama }}"
                        readonly>
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="pendidikan" class="w-full md:w-1/4">Pendidikan</label>
                    <input type="text" id="pendidikan" name="pendidikan"
                        class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        value="{{ $dataDiri->pendidikan }}" readonly>
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="status_pekerjaan" class="w-full md:w-1/4">Status Pekerjaan</label>
                    <select id="status_pekerjaan" name="status_pekerjaan"
                        class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg" onchange="toggleFields(this)">
                        <option value="">Pilih Status Pekerjaan</option>
                        <option value="Belum Bekerja" {{ $dataDiri->statusPekerjaan == 'Belum Bekerja' ? 'selected' : '' }}>
                            Belum Bekerja</option>
                        <option value="Sudah Bekerja" {{ $dataDiri->statusPekerjaan == 'Sudah Bekerja' ? 'selected' : '' }}>
                            Sudah Bekerja</option>
                    </select>
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="nama_instansi" class="w-full md:w-1/4">Nama Instansi Pekerjaan</label>
                    <input type="text" id="nama_instansi" name="nama_instansi"
                        class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        value="{{ $dataDiri->statusPekerjaan == 'Belum Bekerja' ? '' : $dataDiri->namaInstansi }}"
                        {{ $dataDiri->statusPekerjaan == 'Belum Bekerja' ? 'readonly' : '' }}>
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="alamat_instansi" class="w-full md:w-1/4">Alamat Instansi Pekerjaan</label>
                    <input type="text" id="alamat_instansi" name="alamat_instansi"
                        class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                        value="{{ $dataDiri->statusPekerjaan == 'Belum Bekerja' ? '' : $dataDiri->alamatInstansi }}"
                        {{ $dataDiri->statusPekerjaan == 'Belum Bekerja' ? 'readonly' : '' }}>
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="lampiran" class="w-full md:w-1/4">Lampiran</label>
                    <input type="file" id="lampiran" name="lampiran"
                        class="block w-full md:w-3/4 border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
                </div>

                <div class="mt-8 flex justify-end">
                    <a href="{{ url('/warga/ubah-pekerjaan') }}"
                        class="px-4 py-2 mr-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition duration-200">Batal</a>
                    <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-200">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
