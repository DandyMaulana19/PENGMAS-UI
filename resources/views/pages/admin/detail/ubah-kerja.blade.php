@extends('layouts.app')
@section('title', 'Detail Pengajuan Surat Ubah Status Pekerjaan')

@section('content')
    <div
        class="my-10 w-full xs:max-w-xs sm:max-w-md md:max-w-lg lg:max-w-2xl xl:max-w-4xl 2xl:max-w-7xl mx-auto shadow-lg rounded-t-lg">
        <div class="bg-red-600 w-full h-2 rounded-t-lg"></div>

        <div class="container mx-auto p-10">
            <h2 class="text-3xl font-bold text-red-800 mb-6">Detail Pengajuan Surat Ubah Status Pekerjaan</h2>

            <hr class="mb-4 bg-red-600 h-0.5">

            <form>
                <h3 class="text-2xl font-semibold mb-4 my-6">Status Pengajuan</h3>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="status" class="w-full md:w-1/4">Status</label>
                    <select id="status" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg" disabled>
                        <option value="Belum Kerja" {{ $dataDiri->status_pengajuan == 'Belum Kerja' ? 'selected' : '' }}>
                            Menunggu Persetujuan</option>
                        <option value="Mahasiswa" {{ $dataDiri->status_pengajuan == 'Mahasiswa' ? 'selected' : '' }}>
                            Disetujui</option>
                        <option value="Sudah Bekerja"
                            {{ $dataDiri->status_pengajuan == 'Sudah Bekerja' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <div class="flex flex-col md:flex-row items-center mb-4">
                    <label for="catatan" class="w-full md:w-1/4">Catatan</label>
                    <textarea id="catatan" class="w-full md:w-3/4 px-4 py-2 border border-gray-200 rounded-lg" rows="5"
                        placeholder="Catatan" readonly>{{ $dataDiri->catatan }}</textarea>
                </div>
            </form>

            <h3 class="text-2xl font-semibold mb-4 my-6">Data Diri</h3>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="nokk" class="w-full md:w-1/4">No. KK</label>
                <input type="text" id="nokk" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    readonly
                    value="{{ $dataKK->dataKks->isNotEmpty() ? $dataKK->dataKks->first()->no_kk : 'No. KK tidak tersedia' }}">
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="nik" class="w-full md:w-1/4">NIK</label>
                <input type="text" id="nik" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    readonly value="{{ $dataDiri->nik }}">
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="nama_lengkap" class="w-full md:w-1/4">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    readonly value="{{ $dataDiri->namaLengkap }}">
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="jenis_kelamin" class="w-full md:w-1/4">Jenis Kelamin</label>
                <input type="text" id="jenis_kelamin" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    readonly value="{{ $dataDiri->jenisKelamin == 0 ? 'Laki-laki' : 'Perempuan' }}">
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="tempat_lahir" class="w-full md:w-1/4">Tempat Lahir</label>
                <input type="text" id="tempat_lahir" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    readonly value="{{ $dataDiri->tempatLahir }}">
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="tanggal_lahir" class="w-full md:w-1/4">Tanggal Lahir</label>
                <input type="text" id="tanggal_lahir" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    readonly value="{{ $dataDiri->tanggalLahir->format('d F Y') }}">
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="agama" class="w-full md:w-1/4">Agama</label>
                <input type="text" id="agama" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    readonly value="{{ $dataDiri->agama }}">
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="pendidikan" class="w-full md:w-1/4">Pendidikan</label>
                <input type="text" id="pendidikan" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    readonly value="{{ $dataDiri->pendidikan }}">
            </div>
            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="alamat" class="w-full md:w-1/4">Alamat</label>
                <input type="text" id="alamat" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    readonly value="{{ $daerahTujuan ? $daerahTujuan->alamat : 'N/A' }}">
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="namaProvinsi" class="w-full md:w-1/4">Provinsi</label>
                <input type="text" id="namaProvinsi" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    readonly value="{{ $daerahTujuan ? $daerahTujuan->namaProvinsi : 'N/A' }}">
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="namaKabupaten" class="w-full md:w-1/4">Kabupaten</label>
                <input type="text" id="namaKabupaten" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    readonly value="{{ $daerahTujuan ? $daerahTujuan->namaKabupaten : 'N/A' }}">
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="namaKecamatan" class="w-full md:w-1/4">Kecamatan</label>
                <input type="text" id="namaKecamatan"
                    class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg" readonly
                    value="{{ $daerahTujuan ? $daerahTujuan->namaKecamatan : 'N/A' }}">
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="namaKelurahan" class="w-full md:w-1/4">Kelurahan</label>
                <input type="text" id="namaKelurahan"
                    class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg" readonly
                    value="{{ $daerahTujuan ? $daerahTujuan->namaKelurahan : 'N/A' }}">
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="namaRw" class="w-full md:w-1/4">RW</label>
                <input type="text" id="namaRw" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    readonly value="{{ $daerahTujuan ? $daerahTujuan->namaRw : 'N/A' }}">
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="namaRt" class="w-full md:w-1/4">RT</label>
                <input type="text" id="namaRt" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                    readonly value="{{ $daerahTujuan ? $daerahTujuan->namaRt : 'N/A' }}">
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="nama_status" class="w-full md:w-1/4">Status Pekerjaan</label>
                <select id="nama_status" class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg" disabled>
                    <option value="Belum Kerja" {{ $statusPekerjaan->nama_status == 'Belum Kerja' ? 'selected' : '' }}>
                        Belum Bekerja</option>
                    <option value="Mahasiswa" {{ $statusPekerjaan->nama_status == 'Mahasiswa' ? 'selected' : '' }}>
                        Mahasiswa</option>
                    <option value="Sudah Bekerja"
                        {{ $statusPekerjaan->nama_status == 'Sudah Bekerja' ? 'selected' : '' }}>
                        Sudah Bekerja
                    </option>
                    <option value="Lainnya" {{ $statusPekerjaan->nama_status == 'Lainnya' ? 'selected' : '' }}>
                        Lainnya
                    </option>
                </select>
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="namaPekerjaan" class="w-full md:w-1/4">Nama Instansi Pekerjaan</label>
                <input type="text" id="namaPekerjaan"
                    class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg" readonly
                    value="{{ $dataDiri->namaPekerjaan }}">
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="alamatPekerjaan" class="w-full md:w-1/4">Alamat Instansi Pekerjaan</label>
                <input type="text" id="alamatPekerjaan"
                    class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg" readonly
                    value="{{ $dataDiri->alamatPekerjaan }}">
            </div>

            <div class="flex flex-col md:flex-row items-center mb-4">
                <label for="lampiran" class="w-full md:w-1/4">Lampiran</label>
                <input type="file" id="lampiran"
                    class="block w-full md:w-3/4 border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4"
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
