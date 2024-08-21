@extends('layouts.app')

@section('title', 'Daftar Permintaan')

@section('content')
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <div class="max-w-[82rem] w-full mx-auto sm:items-center sm:justify-between my-4 rounded h-full items-center">

        <h1 class="text-3xl font-bold text-gray-800 max-w-[82rem] mx-auto text-start py-12">Permohonan Ubah Status Pekerjaan
        </h1>
    </div>

    <div
        class="px-12 py-8 max-w-[82rem] w-full mx-auto sm:items-center sm:justify-between pb-5 my-4 rounded shadow-md h-full bg-white border-[#D92F2F] border-t-8">
        <h1 class="text-3xl font-bold text-[#AA0000] max-w-[82rem] mx-auto text-start py-4 my-3">Daftar Pengajuan</h1>

        <div class="mb-3 border-b-[1.8px] border-[#AA0000]"></div>

        <table id="dataDiriTable" class="min-w-full hover">
            <thead class="bg-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">No.</th>
                    <th scope="col" class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">NIK</th>
                    <th scope="col" class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">Nama Lengkap
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">Jenis Kelamin
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">Tempat Lahir
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">Tanggal Lahir
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">Agama</th>
                    <th scope="col" class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">Pendidikan
                    </th>
                    <th scope="col" class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">Status</th>
                    <th scope="col" class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#dataDiriTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('kecamatan.ubahKerja') }}',
                    type: 'GET',
                    data: function(d) {
                        d.status = $('#status').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'namaLengkap',
                        name: 'namaLengkap'
                    },
                    {
                        data: 'jenisKelamin',
                        name: 'jenisKelamin'
                    },
                    {
                        data: 'tempatLahir',
                        name: 'tempatLahir'
                    },
                    {
                        data: 'tanggalLahir',
                        name: 'tanggalLahir'
                    },
                    {
                        data: 'agama',
                        name: 'agama'
                    },
                    {
                        data: 'pendidikan',
                        name: 'pendidikan'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#status').change(function() {
                table.ajax.reload();
            });
        });
    </script>
@endpush
