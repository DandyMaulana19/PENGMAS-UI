<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\DataDiri;

class UbahKerjaController extends Controller
{
    public function indexRt()
    {
        $dataDiri = DataDiri::all();

        return view('pages.admin.ubah-kerja', ['dataDiri' => $dataDiri]);
    }

    public function rw()
    {
        $dataDummyTable = [
            [
                'nip' => '1234567890',
                'penulis' => 'John Doe',
                'judulpenelitian' => 'Laki laki',
                'kontributor' => 'Jane Doe',
                'prodi' => 'Agroteknologi',
                'tanggalupload' => '2021-01-01',
                'tanggalpembaruan' => '2021-01-02',

            ],
        ];
        return view('pages.admin.ubah-kerja', [
            'dataDummyTable' => $dataDummyTable
        ]);
    }
    public function kelurahan()
    {
        $dataDummyTable = [
            [
                'nip' => '1234567890',
                'penulis' => 'John Doe',
                'judulpenelitian' => 'Laki laki',
                'kontributor' => 'Jane Doe',
                'prodi' => 'Agroteknologi',
                'tanggalupload' => '2021-01-01',
                'tanggalpembaruan' => '2021-01-02',

            ],
        ];
        return view('pages.admin.ubah-kerja', [
            'dataDummyTable' => $dataDummyTable
        ]);
    }
    public function kecamatan()
    {
        $dataDummyTable = [
            [
                'nip' => '1234567890',
                'penulis' => 'John Doe',
                'judulpenelitian' => 'Laki laki',
                'kontributor' => 'Jane Doe',
                'prodi' => 'Agroteknologi',
                'tanggalupload' => '2021-01-01',
                'tanggalpembaruan' => '2021-01-02',

            ],
        ];
        return view('pages.admin.ubah-kerja', [
            'dataDummyTable' => $dataDummyTable
        ]);
    }

    public function getDataPengajuan(Request $request)
    {
        if ($request->ajax()) {
            $data = DataDiri::join('statuspengajuans', 'datadiris.id_status_pengajuan', '=', 'statuspengajuans.id')
                ->where('statuspengajuans.nama_status', 'RT')
                ->select([
                    'datadiris.id',
                    'datadiris.nik',
                    'datadiris.namaLengkap',
                    'datadiris.jenisKelamin',
                    'datadiris.tempatLahir',
                    'datadiris.tanggalLahir',
                    'datadiris.agama',
                    'datadiris.pendidikan',
                    'statuspengajuans.nama_status'
                ]);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('jenisKelamin', function ($row) {
                    return $row->jenisKelamin == 0 ? 'Laki-laki' : 'Perempuan';
                })
                ->addColumn('tanggalLahir', function ($row) {
                    return $row->tanggalLahir->format('d F Y');
                })
                ->addColumn('status', function ($row) {
                    return 'Pending';
                })
                ->addColumn('action', function ($row) {
                    return '
                        <td class="flex items-center justify-center gap-2 p-2">
                            <button class="flex p-1 text-white bg-orange-500 rounded-lg hover:bg-[#AA0000]" onclick="showDetails(' . $row->id . ')">
                                <box-icon name="show-alt" color="#fff"></box-icon>
                            </button>
                            <button class="flex p-1 text-white bg-blue-500 rounded-lg hover:bg-[#AA0000]" onclick="downloadDetails(' . $row->id . ')">
                                <box-icon name="download" color="#fff"></box-icon>
                            </button>
                        </td>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }
}
