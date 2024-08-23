@extends('layouts.app')
@section('title', 'Tambah Data')

@section('content')
    <div
        class="w-full mx-auto my-10 rounded-t-lg shadow-lg xs:max-w-xs sm:max-w-md md:max-w-lg lg:max-w-2xl xl:max-w-4xl 2xl:max-w-7xl">
        <div class="max-w-[82rem] w-full mx-auto sm:items-center sm:justify-between my-4 rounded h-full items-center">
            <div class="w-full h-2 bg-red-600 rounded-t-lg"></div>


            <div class="container p-10 mx-auto">
                <h2 class="mb-6 text-3xl font-bold text-red-800">Tambah Data</h2>
                @if (is_null($existingPengajuan))
                    <div class="mb-4 bg-yellow-100 text-yellow-600 p-4 rounded-lg">
                        <h1>Silahkan Daftarkan Data KK Baru Terlebih Dahulu</h1>
                    </div>
                @else
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('form.tambah.data.update', ['id' => $id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <h3 class="my-6 mb-4 text-2xl font-semibold">Data Diri</h3>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="nik" class="w-full md:w-1/4">NIK</label>
                            <input id="nik" name="nik" type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan NIK">
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="namaLengkap" class="w-full md:w-1/4">Nama Lengkap</label>
                            <input id="namaLengkap" name="namaLengkap" type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan Nama Lengkap">
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="jenisKelamin" class="w-full md:w-1/4">Jenis Kelamin</label>
                            <select id="jenisKelamin" name="jenisKelamin"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4">
                                <option value="" disabled {{ old('jenisKelamin') ? '' : 'selected' }}>Pilih Jenis
                                    Kelamin
                                </option>
                                <option value="1"
                                    {{ old('jenisKelamin', $dataDiri->jenisKelamin) == '1' ? 'selected' : '' }}>Laki - Laki
                                </option>
                                <option value="0"
                                    {{ old('jenisKelamin', $dataDiri->jenisKelamin) == '0' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="tempatLahir" class="w-full md:w-1/4">Tempat Lahir</label>
                            <input id="tempatLahir" name="tempatLahir" type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan Tempat Lahir">
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="tanggalLahir" class="w-full md:w-1/4">Tanggal Lahir</label>
                            <input id="tanggalLahir" name="tanggalLahir" type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan Tanggal Lahir (YYYY-MM-DD)">
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="agama" class="w-full md:w-1/4">Agama</label>
                            <input id="agama" name="agama" type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan Agama">
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="pendidikan" class="w-full md:w-1/4">Pendidikan</label>
                            <input id="pendidikan" name="pendidikan" type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan Pendidikan">
                        </div>

                        <div class="flex flex-col md:flex-row items-center mb-4">
                            <label for="status_pekerjaan" class="w-full md:w-1/4">Status Pekerjaan</label>
                            <select id="status_pekerjaan" name="status_pekerjaan"
                                class="w-full md:w-3/4 px-4 py-2 border border-gray-300 rounded-lg"
                                onchange="toggleFields(this)">
                                <option value="">Pilih Status Pekerjaan</option>
                                <option value="Belum Bekerja"
                                    {{ old('status_pekerjaan', $dataDiri->id_status_pekerjaan) == 'Belum Bekerja' ? 'selected' : '' }}>
                                    Belum Bekerja</option>
                                <option value="Sudah Bekerja"
                                    {{ old('status_pekerjaan', $dataDiri->id_status_pekerjaan) == 'Sudah Bekerja' ? 'selected' : '' }}>
                                    Sudah Bekerja</option>
                            </select>
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="namaPekerjaan" class="w-full md:w-1/4">Nama Instansi Pekerjaan</label>
                            <input id="namaPekerjaan" name="namaPekerjaan" type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan Nama Instansi Pekerjaan">
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="alamatPekerjaan" class="w-full md:w-1/4">Alamat Instansi Pekerjaan</label>
                            <input id="alamatPekerjaan" name="alamatPekerjaan" type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan Alamat Instansi Pekerjaan">
                        </div>

                        <h3 class="my-6 mb-4 text-2xl font-semibold">Data Daerah Asal</h3>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="alamatAsal" class="w-full md:w-1/4">Alamat</label>
                            <input id="alamatAsal" name="alamatAsal" type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan Alamat">
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="rtAsal" class="w-full md:w-1/4">RT</label>
                            <input id="rtAsal" name="rtAsal" type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan RT">
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="rwAsal" class="w-full md:w-1/4">RW</label>
                            <input id="rwAsal" name="rwAsal" type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan RW">
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="kelurahanAsal" class="w-full md:w-1/4">Desa/Kelurahan</label>
                            <input id="kelurahanAsal" name="kelurahanAsal" type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan Desa/Kelurahan">
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="kecamatanAsal" class="w-full md:w-1/4">Kecamatan</label>
                            <input id="kecamatanAsal" name="kecamatanAsal" type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan Kecamatan">
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="kabupatenAsal" class="w-full md:w-1/4">Kabupaten</label>
                            <input id="kabupatenAsal" name="kabupatenAsal" type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan Kabupaten">
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="provinsiAsal" class="w-full md:w-1/4">Provinsi</label>
                            <input id="provinsiAsal" name="provinsiAsal" type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan Provinsi">
                        </div>

                        <h3 class="my-6 mb-4 text-2xl font-semibold">Data Daerah Tujuan</h3>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="alamatTujuan" class="w-full md:w-1/4">Alamat</label>
                            <input type="text" id="alamatTujuan" name="alamatTujuan"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan Alamat"
                                value="{{ $daerahTujuan->alamat ?? 'Alamat Tidak Tersedia' }}" readonly>
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="rtTujuan" class="w-full md:w-1/4">RT</label>
                            <input type="text" id="rtTujuan" name="rtTujuan"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan RT" value="{{ $daerahTujuan->namaRt ?? 'RT Tidak Tersedia' }}"
                                readonly>
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="rwTujuan" class="w-full md:w-1/4">RW</label>
                            <input type="text" id="rwTujuan" name="rwTujuan"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan RW" value="{{ $daerahTujuan->namaRw ?? 'RW Tidak Tersedia' }}"
                                readonly>
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="kelurahanTujuan" class="w-full md:w-1/4">Desa/Kelurahan</label>
                            <input type="text" id="kelurahanTujuan" name="kelurahanTujuan"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan Kelurahan"
                                value="{{ $daerahTujuan->namaKelurahan ?? 'Kelurahan Tidak Tersedia' }}" readonly>
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="kecamatanTujuan" class="w-full md:w-1/4">Kecamatan</label>
                            <input type="text" id="kecamatanTujuan" name="kecamatanTujuan"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan Kecamatan"
                                value="{{ $daerahTujuan->namaKecamatan ?? 'Kecamatan Tidak Tersedia' }}" readonly>
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="kabupatenTujuan" class="w-full md:w-1/4">Kabupaten</label>
                            <input type="text" id="kabupatenTujuan" name="kabupatenTujuan"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan Kabupaten"
                                value="{{ $daerahTujuan->namaKabupaten ?? 'Kabupaten Tidak Tersedia' }}" readonly>
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="provinsiTujuan" class="w-full md:w-1/4">Provinsi</label>
                            <input type="text" id="provinsiTujuan" name="provinsiTujuan"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg md:w-3/4"
                                placeholder="Masukkan Provinsi"
                                value="{{ $daerahTujuan->namaProvinsi ?? 'Provinsi Tidak Tersedia' }}" readonly>
                        </div>

                        <div class="flex flex-col items-center mb-4 md:flex-row">
                            <label for="" class="w-full md:w-1/4">Lampiran</label>
                            <input type="file" name="" id=""
                                class="block w-full text-sm border border-gray-200 rounded-lg shadow-sm md:w-3/4 focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4"
                                disabled>
                        </div>

                        <div class="flex justify-end mt-8">
                            <a href="{{ url('/warga/pindah-masuk') }}"
                                class="px-4 py-2 mr-2 text-gray-800 transition duration-200 bg-gray-200 rounded-md hover:bg-gray-300">Batal</a>
                            <button type="submit"
                                class="px-4 py-2 text-white transition duration-200 bg-red-600 rounded-md hover:bg-red-700">Submit</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <script>
        function toggleFields(selectElement) {
            var status = selectElement.value;
            var namaPekerjaan = document.getElementById('namaPekerjaan');
            var alamatPekerjaan = document.getElementById('alamatPekerjaan');

            if (status === 'Belum Bekerja') {
                namaPekerjaan.value = '';
                alamatPekerjaan.value = '';
                namaPekerjaan.readOnly = true;
                alamatPekerjaan.readOnly = true;
                namaPekerjaan.placeholder = '';
                alamatPekerjaan.placeholder = '';
                namaPekerjaan.classList.add('bg-gray-200');
                alamatPekerjaan.classList.add('bg-gray-200');
            } else if (status === 'Sudah Bekerja') {
                namaPekerjaan.readOnly = false;
                alamatPekerjaan.readOnly = false;
                namaPekerjaan.placeholder = 'Masukkan Nama Instansi Pekerjaan';
                alamatPekerjaan.placeholder = 'Masukkan Alamat Instansi Pekerjaan';
                namaPekerjaan.classList.remove('bg-gray-200');
                alamatPekerjaan.classList.remove('bg-gray-200');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var statusSelect = document.getElementById('status_pekerjaan');
            if (statusSelect) {
                toggleFields(statusSelect);
            }
        });
    </script>
@endsection
