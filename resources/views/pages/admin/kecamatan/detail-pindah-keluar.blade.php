@extends('layouts.app')
@section('title', 'Detail Pengajuan Surat Pindah Keluar')

@section('content')
    <div
        class="w-full mx-auto my-10 rounded-t-lg shadow-lg xs:max-w-xs sm:max-w-md md:max-w-lg lg:max-w-2xl xl:max-w-4xl 2xl:max-w-7xl">
        <div class="w-full h-2 bg-red-600 rounded-t-lg"></div>

        <div class="container p-10 mx-auto">
            <h2 class="mb-6 text-3xl font-bold text-red-800">Detail Pengajuan Surat Pindah Keluar</h2>

            <hr class="mb-4 bg-red-600 h-0.5">

            <form action="{{ route('kecamatan.submitPindahKeluar', $dataDiri->id) }}" method="POST">
                @csrf
                <h3 class="my-6 mb-4 text-2xl font-semibold">Status Pengajuan</h3>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="Status" class="w-full md:w-1/4">Status</label>
                    <select id="Status" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4" disabled>
                        <option selected disabled>Menunggu Persetujuan</option>
                        <option value="Disetujui">Disetujui</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">Catatan</label>
                    <textarea class="w-full px-4 py-2 border border-gray-200 rounded-lg md:w-3/4" name="catatan" rows="5"
                        placeholder="Catatan"></textarea>
                </div>

                <h3 class="my-6 mb-4 text-2xl font-semibold">Data Diri</h3>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">No. KK</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        {{-- value="{{ $dataKK->dataKks->isNotEmpty() ? $dataKK->dataKks->first()->no_kk : 'No. KK tidak tersedia' }}" --}} value="{{ 'No. KK tidak tersedia' }}" readonly>
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">NIK</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        value="{{ $dataDiri->nik }}" readonly>
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">Nama Lengkap</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        value="{{ $dataDiri->namaLengkap }}" readonly>
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">Jenis Kelamin</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        value="{{ $dataDiri->jenisKelamin == 0 ? 'Laki-laki' : 'Perempuan' }}" readonly>
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">Tempat Lahir</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        value="{{ $dataDiri->tempatLahir }}" readonly>
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">Tanggal Lahir</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        value="{{ $dataDiri->tanggalLahir->translatedFormat('d F Y') }}" readonly>
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">Agama</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        value="{{ $dataDiri->agama }}" readonly>
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">Pendidikan</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        value="{{ $dataDiri->pendidikan }}" readonly>
                </div>

                <h3 class="my-6 mb-4 text-2xl font-semibold">Data Daerah Tujuan</h3>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">Alamat</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        value="{{ $daerahTujuan ? $daerahTujuan->alamat : 'Alamat Tidak Tersedia' }}" readonly>
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">RT</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        value="{{ $daerahTujuan ? $daerahTujuan->namaRt : 'RT Tidak Tersedia' }}" readonly>
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">RW</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        value="{{ $daerahTujuan ? $daerahTujuan->namaRw : 'RW Tidak Tersedia' }}" readonly>
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">Desa/Kelurahan</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        value="{{ $daerahTujuan ? $daerahTujuan->namaKelurahan : 'Kelurahan Tidak Tersedia' }}" readonly>
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">Kecamatan</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        value="{{ $daerahTujuan ? $daerahTujuan->namaKecamatan : 'Kecamatan Tidak Tersedia' }}" readonly>
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">Kabupaten</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        value="{{ $daerahTujuan ? $daerahTujuan->namaKabupaten : 'Kabupaten Tidak Tersedia' }}" readonly>
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">Provinsi</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        value="{{ $daerahTujuan ? $daerahTujuan->namaProvinsi : 'Provinsi Tidak Tersedia' }}" readonly>
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="" class="w-full md:w-1/4">Lampiran</label>
                    <input type="file" name="" id=""
                        class="block w-full text-sm border border-gray-200 rounded-lg shadow-sm md:w-3/4 focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
                </div>

                <div class="flex justify-end mt-8">
                    <button type="button"
                        class="px-4 py-2 mr-2 text-gray-800 transition duration-200 bg-gray-200 rounded-md hover:bg-gray-300">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 text-white transition duration-200 bg-red-600 rounded-md hover:bg-red-700">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
