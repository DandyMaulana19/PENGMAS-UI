@extends('layouts.app')

@section('title', 'Detail Pengajuan Pindah Keluar')

@section('content')
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    {{-- Status Pengajuan --}}
    <div
        class="w-full mx-auto my-10 rounded-t-lg shadow-lg xs:max-w-xs sm:max-w-md md:max-w-lg lg:max-w-2xl xl:max-w-4xl 2xl:max-w-7xl">
        <div class="w-full h-2 bg-red-600 rounded-t-lg"></div>

        <div class="container p-10 mx-auto">
            <h2 class="mb-6 text-3xl font-bold text-red-800">Detail Pengajuan Surat Ubah Status Pekerjaan</h2>

            <hr class="mb-4 bg-red-600 h-0.5">

            <div class="flex flex-col items-center mb-4 md:flex-row">
                <label for="catatan" class="w-full md:w-1/4">Catatan</label>
                <textarea id="catatan" class="w-full px-4 py-2 border border-gray-200 rounded-lg md:w-3/4" rows="5">{{ $catatan }}</textarea>
            </div>

            {{-- Data Diri --}}
            <h3 class="my-6 mb-4 text-2xl font-semibold">Data Diri</h3>

            <div class="flex flex-col items-center mb-4 md:flex-row">
                <label for="no_kk" class="w-full md:w-1/4">No. KK</label>
                <input id="no_kk" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                    value="{{ $dataKK ? $dataKK->no_kk : 'No. KK tidak tersedia' }}" readonly>
            </div>

            <div class="flex flex-col items-center mb-4 md:flex-row">
                <label for="nik" class="w-full md:w-1/4">NIK</label>
                <input id="nik" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                    value="{{ $dataDiri->nik }}" readonly>
            </div>

            <div class="flex flex-col items-center mb-4 md:flex-row">
                <label for="namaLengkap" class="w-full md:w-1/4">Nama Lengkap</label>
                <input id="namaLengkap" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                    value="{{ $dataDiri->namaLengkap }}" readonly>
            </div>

            <div class="flex flex-col items-center mb-4 md:flex-row">
                <label for="jenisKelamin" class="w-full md:w-1/4">Jenis Kelamin</label>
                <input id="jenisKelamin" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                    value="{{ $dataDiri->jenisKelamin == 0 ? 'Laki-laki' : 'Perempuan' }}" readonly>
            </div>

            <div class="flex flex-col items-center mb-4 md:flex-row">
                <label for="tempatLahir" class="w-full md:w-1/4">Tempat Lahir</label>
                <input id="tempatLahir" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                    value="{{ $dataDiri->tempatLahir }}" readonly>
            </div>

            <div class="flex flex-col items-center mb-4 md:flex-row">
                <label for="tanggalLahir" class="w-full md:w-1/4">Tanggal Lahir</label>
                <input id="tanggalLahir" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                    value="{{ $dataDiri->tanggalLahir->format('d F Y') }}" readonly>
            </div>

            <div class="flex flex-col items-center mb-4 md:flex-row">
                <label for="agama" class="w-full md:w-1/4">Agama</label>
                <input id="agama" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                    value="{{ $dataDiri->agama }}" readonly>
            </div>

            <div class="flex flex-col items-center mb-4 md:flex-row">
                <label for="pendidikan" class="w-full md:w-1/4">Pendidikan</label>
                <input id="pendidikan" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                    value="{{ $dataDiri->pendidikan }}" readonly>
            </div>

            {{-- Data Daerah Tujuan --}}
            <h3 class="my-6 mb-4 text-2xl font-semibold">Data Daerah Tujuan</h3>

            <div class="flex flex-col items-center mb-4 md:flex-row">
                <label for="alamat" class="w-full md:w-1/4">Alamat</label>
                <input id="alamat" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                    value="{{ $daerahTujuan ? $daerahTujuan->alamat : 'Alamat tidak tersedia' }}" readonly>
            </div>

            <div class="flex flex-col items-center mb-4 md:flex-row">
                <label for="rt" class="w-full md:w-1/4">RT</label>
                <input id="rt" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                    value="{{ $daerahTujuan ? $daerahTujuan->namaRt : 'RT tidak tersedia' }}" readonly>
            </div>

            <div class="flex flex-col items-center mb-4 md:flex-row">
                <label for="rw" class="w-full md:w-1/4">RW</label>
                <input id="rw" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                    value="{{ $daerahTujuan ? $daerahTujuan->namaRw : 'RW tidak tersedia' }}" readonly>
            </div>

            <div class="flex flex-col items-center mb-4 md:flex-row">
                <label for="kelurahan" class="w-full md:w-1/4">Desa/Kelurahan</label>
                <input id="kelurahan" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                    value="{{ $daerahTujuan ? $daerahTujuan->namaKelurahan : 'Desa/Kelurahan tidak tersedia' }}" readonly>
            </div>

            <div class="flex flex-col items-center mb-4 md:flex-row">
                <label for="kecamatan" class="w-full md:w-1/4">Kecamatan</label>
                <input id="kecamatan" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                    value="{{ $daerahTujuan ? $daerahTujuan->namaKecamatan : 'Kecamatan tidak tersedia' }}" readonly>
            </div>

            <div class="flex flex-col items-center mb-4 md:flex-row">
                <label for="kabupaten" class="w-full md:w-1/4">Kabupaten</label>
                <input id="kabupaten" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                    value="{{ $daerahTujuan ? $daerahTujuan->namaKabupaten : 'Kabupaten tidak tersedia' }}" readonly>
            </div>

            <div class="flex flex-col items-center mb-4 md:flex-row">
                <label for="provinsi" class="w-full md:w-1/4">Provinsi</label>
                <input id="provinsi" type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                    value="{{ $daerahTujuan ? $daerahTujuan->namaProvinsi : 'Provinsi tidak tersedia' }}" readonly>
            </div>

            {{-- Lampiran --}}
            <div class="flex flex-col items-center mb-4 md:flex-row">
                <label for="lampiran" class="w-full md:w-1/4">Lampiran</label>
                <input type="file" id="lampiran"
                    class="block w-full text-sm border border-gray-200 rounded-lg shadow-sm md:w-3/4 focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-gray-900 hover:file:bg-gray-100 disabled"
                    disabled>
            </div>

            <div class="flex justify-end mt-8">
                <a href="{{ url('warga/dashboard/' . $dataDiri->id_user) }}"
                    class="px-4 py-2 mr-2 text-gray-800 transition duration-200 bg-gray-200 rounded-md hover:bg-gray-300">Kembali</a>
            </div>

        </div>
    </div>
@endsection
