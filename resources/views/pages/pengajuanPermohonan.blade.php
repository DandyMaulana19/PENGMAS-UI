@extends('layouts.app')
@section('title', 'Pengajuan Permohonan Pindah Keluar')

@section('content')
    <div
        class="w-full mx-auto my-10 rounded-t-lg shadow-lg xs:max-w-xs sm:max-w-md md:max-w-lg lg:max-w-2xl xl:max-w-4xl 2xl:max-w-7xl">
        <div class="w-full h-2 bg-red-600 rounded-t-lg"></div>

        <div class="container p-10 mx-auto">
            <h2 class="mb-6 text-3xl font-bold text-red-800">Pengajuan Permohonan Pindah Keluar</h2>

            <hr class="mb-4 bg-red-600 h-0.5">

            @if ($existingPengajuan)
                <div class="mb-4 bg-yellow-100 text-yellow-600 p-4 rounded-lg">
                    <p>Anda sudah pernah mengajukan perubahan status pekerjaan dan sedang dalam proses persetujuan. Anda
                        tidak dapat mengajukan lagi saat ini.</p>
                </div>
            @else
                <h3 class="my-6 mb-4 text-2xl font-semibold">Data Diri</h3>

                @if ($errors->any())
                    <div class="mb-4 bg-red-100 text-red-600 p-4 rounded-lg">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="flex flex-col items-center mb-4 md:flex-row">
                    <label for="no_kk" class="w-full md:w-1/4">No. KK</label>
                    <input type="text" id="no_kk" class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                        placeholder="Masukkan No. KK" name="no_kk"
                        value="{{ $datadiri->dataKks->isNotEmpty() ? $datadiri->dataKks->first()->no_kk : 'No. KK tidak tersedia' }}"
                        readonly>
                </div>

                @foreach (['nik' => 'NIK', 'namaLengkap' => 'Nama Lengkap', 'jenisKelamin' => 'Jenis Kelamin', 'tempatLahir' => 'Tempat Lahir', 'tanggalLahir' => 'Tanggal Lahir', 'agama' => 'Agama', 'pendidikan' => 'Pendidikan'] as $field => $label)
                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="{{ $field }}" class="w-full md:w-1/4">{{ $label }}</label>
                        <input type="text" id="{{ $field }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            placeholder="Masukkan {{ $label }}" name="{{ $field }}"
                            value="{{ $datadiri->$field }}" readonly>
                    </div>
                @endforeach

                <h3 class="my-6 mb-4 text-2xl font-semibold">Data Daerah Tujuan</h3>

                <form action="{{ route('form-pindah-keluar', $datadiri->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="alamat" class="w-full md:w-1/4">Alamat</label>
                        <input type="text" id="alamat"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            placeholder="Masukkan Alamat" name="alamat">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="namaRt" class="w-full md:w-1/4">RT</label>
                        <input type="text" id="namaRt"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4" placeholder="Masukkan RT"
                            name="namaRt">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="namaRw" class="w-full md:w-1/4">RW</label>
                        <input type="text" id="namaRw"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4" placeholder="Masukkan RW"
                            name="namaRw">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="namaKelurahan" class="w-full md:w-1/4">Desa/Kelurahan</label>
                        <input type="text" id="namaKelurahan"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            placeholder="Masukkan Desa/Kelurahan" name="namaKelurahan">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="namaKecamatan" class="w-full md:w-1/4">Kecamatan</label>
                        <input type="text" id="namaKecamatan"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            placeholder="Masukkan Kecamatan" name="namaKecamatan">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="namaKabupaten" class="w-full md:w-1/4">Kabupaten</label>
                        <input type="text" id="namaKabupaten"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            placeholder="Masukkan Kabupaten" name="namaKabupaten">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="namaProvinsi" class="w-full md:w-1/4">Provinsi</label>
                        <input type="text" id="namaProvinsi"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                            placeholder="Masukkan Provinsi" name="namaProvinsi">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="lampiran" class="w-full md:w-1/4">Lampiran</label>
                        <input type="file" id="lampiran" name="lampiran"
                            class="block w-full text-sm border border-gray-200 rounded-lg shadow-sm md:w-3/4 focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
                    </div>

                    <div class="flex flex-col items-center mb-4 md:flex-row">
                        <label for="lampiran" class="w-full md:w-1/4">Lampiran</label>
                        <input type="file" id="lampiran" name="lampiran"
                            class="block w-full text-sm border border-gray-200 rounded-lg shadow-sm md:w-3/4 focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
                    </div>

                    <div class="flex justify-end mt-8">
                        <a href="{{ url('/warga/pindah-keluar') }}"
                            class="px-4 py-2 mr-2 text-gray-800 transition duration-200 bg-gray-200 rounded-md hover:bg-gray-300">Batal</a>
                        <button type="submit"
                            class="px-4 py-2 text-white transition duration-200 bg-red-600 rounded-md hover:bg-red-700">Submit</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
