@extends('layouts.app')

@section('title', 'Detail Pengajuan Pindah Keluar')

@section('content')
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    {{-- Status Pengajuan --}}
    <div
        class="my-10 w-full xs:max-w-xs sm:max-w-md md:max-w-lg lg:max-w-2xl xl:max-w-4xl 2xl:max-w-7xl mx-auto shadow-lg rounded-t-lg">
        <div class="bg-red-600 w-full h-2 rounded-t-lg"></div>

        <div class="container mx-auto p-10">
            <h2 class="text-3xl font-bold text-red-800 mb-6">Detail Pengajuan Surat Ubah Status Pekerjaan</h2>

            <hr class="mb-4 bg-red-600 h-0.5">

            <form action="">
                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="Status" class="w-full md:w-1/4">Status</label>
                    <select id="Status" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg">
                        <option value="Menunggu Persetujuan" {{ $statusPekerjaan->status == 'Pending' ? 'selected' : '' }}>
                            Menunggu
                            Persetujuan</option>
                        <option value="Disetujui" {{ $statusPekerjaan->status == 'Approved' ? 'selected' : '' }}>Disetujui
                        </option>
                        <option value="Ditolak" {{ $statusPekerjaan->status == 'Rejected' ? 'selected' : '' }}>Ditolak
                        </option>
                    </select>
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="catatan" class="w-full md:w-1/4">Catatan</label>
                    <textarea id="catatan" class="w-full md:w-3/4 px-4 py-2 border border-gray-200 rounded-lg" rows="5">{{ $dataDiri->catatan }}</textarea>
                </div>
            </form>

            {{-- Data Diri --}}
            <h3 class="text-2xl font-semibold mb-4 my-6">Data Diri</h3>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="no_kk" class="w-full md:w-1/4">No. KK</label>
                <input id="no_kk" type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    value="{{ $dataKK ? $dataKK->no_kk : 'No. KK tidak tersedia' }}" readonly>
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="nik" class="w-full md:w-1/4">NIK</label>
                <input id="nik" type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    value="{{ $dataDiri->nik }}" readonly>
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="namaLengkap" class="w-full md:w-1/4">Nama Lengkap</label>
                <input id="namaLengkap" type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    value="{{ $dataDiri->namaLengkap }}" readonly>
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="jenisKelamin" class="w-full md:w-1/4">Jenis Kelamin</label>
                <input id="jenisKelamin" type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    value="{{ $dataDiri->jenisKelamin == 0 ? 'Laki-laki' : 'Perempuan' }}" readonly>
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="tempatLahir" class="w-full md:w-1/4">Tempat Lahir</label>
                <input id="tempatLahir" type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    value="{{ $dataDiri->tempatLahir }}" readonly>
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="tanggalLahir" class="w-full md:w-1/4">Tanggal Lahir</label>
                <input id="tanggalLahir" type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    value="{{ $dataDiri->tanggalLahir->format('d F Y') }}" readonly>
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="agama" class="w-full md:w-1/4">Agama</label>
                <input id="agama" type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    value="{{ $dataDiri->agama }}" readonly>
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="pendidikan" class="w-full md:w-1/4">Pendidikan</label>
                <input id="pendidikan" type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    value="{{ $dataDiri->pendidikan }}" readonly>
            </div>

            {{-- Data Daerah Tujuan --}}
            <h3 class="text-2xl font-semibold mb-4 my-6">Data Daerah Tujuan</h3>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="alamat" class="w-full md:w-1/4">Alamat</label>
                <input id="alamat" type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    value="{{ $daerahTujuan ? $daerahTujuan->alamat : 'Alamat tidak tersedia' }}" readonly>
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="rt" class="w-full md:w-1/4">RT</label>
                <input id="rt" type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    value="{{ $daerahTujuan ? $daerahTujuan->namaRt : 'RT tidak tersedia' }}" readonly>
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="rw" class="w-full md:w-1/4">RW</label>
                <input id="rw" type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    value="{{ $daerahTujuan ? $daerahTujuan->namaRw : 'RW tidak tersedia' }}" readonly>
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="kelurahan" class="w-full md:w-1/4">Desa/Kelurahan</label>
                <input id="kelurahan" type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    value="{{ $daerahTujuan ? $daerahTujuan->namaKelurahan : 'Desa/Kelurahan tidak tersedia' }}" readonly>
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="kecamatan" class="w-full md:w-1/4">Kecamatan</label>
                <input id="kecamatan" type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    value="{{ $daerahTujuan ? $daerahTujuan->namaKecamatan : 'Kecamatan tidak tersedia' }}" readonly>
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="kabupaten" class="w-full md:w-1/4">Kabupaten</label>
                <input id="kabupaten" type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    value="{{ $daerahTujuan ? $daerahTujuan->namaKabupaten : 'Kabupaten tidak tersedia' }}" readonly>
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="provinsi" class="w-full md:w-1/4">Provinsi</label>
                <input id="provinsi" type="text" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    value="{{ $daerahTujuan ? $daerahTujuan->namaProvinsi : 'Provinsi tidak tersedia' }}" readonly>
            </div>

            {{-- Lampiran --}}
            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="lampiran" class="w-full md:w-1/4">Lampiran</label>
                <input type="file" id="lampiran"
                    class="block w-full md:w-3/4 border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-gray-900 hover:file:bg-gray-100 disabled"
                    disabled>
            </div>

            <div class="mt-8 flex justify-end">
                <button type="button"
                    class="px-4 py-2 mr-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition duration-200">Cancel</button>
                <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-200">Submit</button>
            </div>
        </div>
    </div>
@endsection
