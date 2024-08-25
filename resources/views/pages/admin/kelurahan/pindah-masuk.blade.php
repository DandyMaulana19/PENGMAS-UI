@extends('layouts.app')

@section('title', 'Daftar Permintaan')

@section('content')
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    {{-- Cards Container --}}
    <div class=" max-w-[82rem] w-full mx-auto sm:items-center sm:justify-between  my-4 rounded h-full items-csenter">

        <h1 class="text-3xl font-bold text-gray-800 max-w-[82rem] mx-auto text-start py-12">Permohonan Pindah Masuk</h1>

        @if (session('success'))
            <div id="dismiss-toast"
                class="max-w-full my-4 transition duration-300 bg-green-600 border border-gray-200 shadow-lg hs-removing:translate-x-5 hs-removing:opacity-0 rounded-xl"
                role="alert" tabindex="-1" aria-labelledby="hs-toast-dismiss-button-label">
                <div class="flex p-4">
                    <p id="hs-toast-dismiss-button-label" class="text-sm text-white">
                        {{ session('success') }}
                    </p>

                    <div class="ms-auto">
                        <button type="button"
                            class="inline-flex items-center justify-center text-white rounded-lg opacity-50 shrink-0 size-5 hover:opacity-100 focus:outline-none focus:opacity-100"
                            aria-label="Close" data-hs-remove-element="#dismiss-toast">
                            <span class="sr-only">Close</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        {{-- cards --}}
        <div class="flex py-5 space-x-4 ">
            <div class="flex justify-start w-full p-3 border rounded-lg shadow-md">
                <div class="px-4 py-4 bg-[#46E02D] rounded flex items-center">
                    <box-icon name='check' color="#ffff"></box-icon>
                </div>
                <div class="inline-flex flex-col px-4">
                    <span class="font-bold text-gray-500">Disetujui</span>
                    <span class="font-bold text-gray-800">{{ $diterima }}</span>
                </div>
            </div>

            <div class="flex justify-start w-full p-3 border rounded-lg shadow-md">
                <div class="px-4 py-4 rounded bg-[#FFA426] flex items-center">
                    <box-icon name='time-five' color="#ffff"></box-icon>
                </div>
                <div class="inline-flex flex-col px-4">
                    <span class="font-bold text-gray-500">Menunggu Persetujuan</span>
                    <span class="font-bold text-gray-800">1</span>
                    {{-- <span class="font-bold text-gray-800">{{ $pending }}</span> --}}
                </div>
            </div>

            <div class="flex justify-start w-full p-3 border rounded-lg shadow-md">
                <div class="px-4 py-4 bg-[#FC544B] rounded flex items-center">
                    <box-icon name='message-alt-x' color="#ffff"></box-icon>
                </div>
                <div class="inline-flex flex-col px-4">
                    <span class="font-bold text-gray-500">Ditolak</span>
                    <span class="font-bold text-gray-800">{{ $ditolak }}</span>
                </div>
            </div>
        </div>
    </div>


    {{-- table container --}}
    <div
        class="px-12 py-8 max-w-[82rem] w-full mx-auto sm:items-center sm:justify-between pb-5 my-4 rounded shadow-md h-full bg-slate-100 border-[#D92F2F] border-t-8 ">

        {{-- title --}}
        <h1 class="text-3xl font-bold text-[#AA0000] max-w-[82rem]  mx-auto text-start py-4 my-3">Daftar Pengajuan</h1>

        {{-- divider --}}
        <div class="mb-3 border-b-[1.8px] border-[#AA0000]"></div>

        {{-- <div class="flex items-center justify-end gap-4 my-4">
            <label for="search" class="text-sm text-gray-800 text-md">Cari :</label>
            <input type="search" class="p-2 border-2 rounded-md">
        </div> --}}

        {{-- table --}}
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
                    url: '{{ route('kelurahan.pindahMasuk') }}',
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
