@extends('layouts.app')
@section('title', 'Detail Pengajuan Surat Ubah Status Pekerjaan')

@section('content')
    <div
        class="w-full mx-auto my-10 rounded-t-lg shadow-lg xs:max-w-xs sm:max-w-md md:max-w-lg lg:max-w-2xl xl:max-w-4xl 2xl:max-w-7xl">
        <div class="w-full h-2 bg-red-600 rounded-t-lg"></div>

        <div class="container p-10 mx-auto">
            <h2 class="mb-6 text-3xl font-bold text-red-800">Detail Pengajuan Surat Ubah Status Pekerjaan</h2>

            <hr class="mb-4 bg-red-600 h-0.5">

            <form action="{{ route('kelurahan.submitUbahKerja', $dataDiri->id) }}" method="POST">
                @csrf
                <h3 class="my-6 mb-4 text-2xl font-semibold">Status Pengajuan</h3>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="status" class="w-full md:w-1/4">Status</label>
                    <select id="Status" name="statusKeputusan"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4">
                        <option selected disabled>Menunggu Persetujuan</option>
                        <option value="Disetujui">Disetujui</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                </div>

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="catatan" class="w-full md:w-1/4">Catatan</label>
                    <textarea id="catatan" class="w-full px-4 py-2 border border-gray-200 rounded-lg md:w-3/4"
                        rows="5" placeholder="Catatan" name="catatan"><textarea>
                </div>

                    <h3 class="my-6 mb-4 text-2xl font-semibold">Data Diri</h3>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="nokk" class="w-full md:w-1/4">No. KK</label>
                        <input type="text" id="nokk" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            readonly
                            value="{{ $dataKK->dataKks->isNotEmpty() ? $dataKK->dataKks->first()->no_kk : 'No. KK tidak tersedia' }}">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="nik" class="w-full md:w-1/4">NIK</label>
                        <input type="text" id="nik" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            readonly value="{{ $dataDiri->nik }}">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="nama_lengkap" class="w-full md:w-1/4">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            readonly value="{{ $dataDiri->namaLengkap }}">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="jenis_kelamin" class="w-full md:w-1/4">Jenis Kelamin</label>
                        <input type="text" id="jenis_kelamin" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            readonly value="{{ $dataDiri->jenisKelamin == 0 ? 'Laki-laki' : 'Perempuan' }}">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="tempat_lahir" class="w-full md:w-1/4">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            readonly value="{{ $dataDiri->tempatLahir }}">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="tanggal_lahir" class="w-full md:w-1/4">Tanggal Lahir</label>
                        <input type="text" id="tanggal_lahir" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            readonly value="{{ $dataDiri->tanggalLahir->format('d F Y') }}">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="agama" class="w-full md:w-1/4">Agama</label>
                        <input type="text" id="agama" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            readonly value="{{ $dataDiri->agama }}">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="pendidikan" class="w-full md:w-1/4">Pendidikan</label>
                        <input type="text" id="pendidikan" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            readonly value="{{ $dataDiri->pendidikan }}">
                    </div>
                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="alamat" class="w-full md:w-1/4">Alamat</label>
                        <input type="text" id="alamat" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            readonly value="{{ $daerahTujuan ? $daerahTujuan->alamat : 'N/A' }}">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="namaProvinsi" class="w-full md:w-1/4">Provinsi</label>
                        <input type="text" id="namaProvinsi" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            readonly value="{{ $daerahTujuan ? $daerahTujuan->namaProvinsi : 'N/A' }}">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="namaKabupaten" class="w-full md:w-1/4">Kabupaten</label>
                        <input type="text" id="namaKabupaten"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4" readonly
                            value="{{ $daerahTujuan ? $daerahTujuan->namaKabupaten : 'N/A' }}">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="namaKecamatan" class="w-full md:w-1/4">Kecamatan</label>
                        <input type="text" id="namaKecamatan"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4" readonly
                            value="{{ $daerahTujuan ? $daerahTujuan->namaKecamatan : 'N/A' }}">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="namaKelurahan" class="w-full md:w-1/4">Kelurahan</label>
                        <input type="text" id="namaKelurahan"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4" readonly
                            value="{{ $daerahTujuan ? $daerahTujuan->namaKelurahan : 'N/A' }}">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="namaRw" class="w-full md:w-1/4">RW</label>
                        <input type="text" id="namaRw" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            readonly value="{{ $daerahTujuan ? $daerahTujuan->namaRw : 'N/A' }}">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="namaRt" class="w-full md:w-1/4">RT</label>
                        <input type="text" id="namaRt" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            readonly value="{{ $daerahTujuan ? $daerahTujuan->namaRt : 'N/A' }}">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="nama_status" class="w-full md:w-1/4">Status Pekerjaan</label>
                        <select id="nama_status" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4" disabled>
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

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="namaPekerjaan" class="w-full md:w-1/4">Nama Instansi Pekerjaan</label>
                        <input type="text" id="namaPekerjaan"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4" readonly
                            value="{{ $dataDiri->namaPekerjaan }}">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="alamatPekerjaan" class="w-full md:w-1/4">Alamat Instansi Pekerjaan</label>
                        <input type="text" id="alamatPekerjaan"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4" readonly
                            value="{{ $dataDiri->alamatPekerjaan }}">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="lampiran" class="w-full md:w-1/4">Lampiran</label>
                        <input type="file" id="lampiran"
                            class="block w-full text-sm border border-gray-200 rounded-lg shadow-sm md:w-3/4 focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4"
                            disabled>
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
