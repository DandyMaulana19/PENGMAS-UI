@extends('layouts.app')

@section('title', 'Ubah Kerja')

@section('content')

    <div class="max-w-[82rem] w-full mx-auto sm:items-center sm:justify-between my-4 rounded h-full items-center">
        <div class="w-full p-6 bg-white shadow-md rounded-xl">
            <h1 class="mb-6 text-2xl font-bold">Pengajuan Ubah Status Pekerjaan</h1>
            <hr class="w-full border border-[#9B1010] mb-6">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden border">
                            <table id="dataDiriTable" class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">No.</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">Nama
                                            Lengkap</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">Jenis
                                            Kelamin</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">Tempat
                                            Lahir</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">Tanggal
                                            Lahir</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">Agama
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-semibold text-black uppercase text-start">
                                            Pendidikan</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-xs font-semibold text-black uppercase text-start"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#dataDiriTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('data-diri.getData') }}',
                    type: 'GET',
                    dataSrc: 'data',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
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
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endpush
