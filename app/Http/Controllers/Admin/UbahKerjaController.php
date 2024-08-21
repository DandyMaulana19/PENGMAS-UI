<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\DataDiri;
use App\Models\DaerahTujuan;

class UbahKerjaController extends Controller
{
    public function show($id)
    {
        $dataDiri = DataDiri::with('dataKks', 'statusPekerjaan')->findOrFail($id);

        $daerahTujuan = DaerahTujuan::where('dataDiri_id', $id)->first();

        return view('pages.detailPengajuanSurat.detailPengajuanPekerjaan', [
            'dataDiri' => $dataDiri,
            'dataKK' => $dataDiri,
            'daerahTujuan' => $daerahTujuan,
            'statusPekerjaan' => $dataDiri->statusPekerjaan
        ]);
    }

    public function rt(Request $request)
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
                        <button class="flex p-1 text-white bg-orange-500 rounded-lg hover:bg-[#AA0000]" onclick="window.location.href=\'' . route('rt.detailUbahKerja', ['id' => $row->id]) . '\'">
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

        return view('pages.admin.rt.ubah-kerja');
        // return response()->json(['error' => 'Invalid request'], 400);
    }

    public function rw(Request $request)
    {
        if ($request->ajax()) {
            $data = DataDiri::join('statuspengajuans', 'datadiris.id_status_pengajuan', '=', 'statuspengajuans.id')
                ->where('statuspengajuans.nama_status', 'RW')
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
                        <button class="flex p-1 text-white bg-orange-500 rounded-lg hover:bg-[#AA0000]" onclick="window.location.href=\'' . route('rw.detailUbahKerja', ['id' => $row->id]) . '\'">
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

        return view('pages.admin.rw.ubah-kerja');
        // return response()->json(['error' => 'Invalid request'], 400);
    }

    public function kelurahan(Request $request)
    {
        if ($request->ajax()) {
            $data = DataDiri::join('statuspengajuans', 'datadiris.id_status_pengajuan', '=', 'statuspengajuans.id')
                ->where('statuspengajuans.nama_status', 'Kelurahan')
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
                        <button class="flex p-1 text-white bg-orange-500 rounded-lg hover:bg-[#AA0000]" onclick="window.location.href=\'' . route('kelurahan.detailUbahKerja', ['id' => $row->id]) . '\'">
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

        return view('pages.admin.kelurahan.ubah-kerja');
        // return response()->json(['error' => 'Invalid request'], 400);
    }

    public function kecamatan(Request $request)
    {
        if ($request->ajax()) {
            $data = DataDiri::join('statuspengajuans', 'datadiris.id_status_pengajuan', '=', 'statuspengajuans.id')
                ->where('statuspengajuans.nama_status', 'Kecamatan')
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
                        <button class="flex p-1 text-white bg-orange-500 rounded-lg hover:bg-[#AA0000]" onclick="window.location.href=\'' . route('kecamatan.detailUbahKerja', ['id' => $row->id]) . '\'">
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

        return view('pages.admin.kecamatan.ubah-kerja');
        // return response()->json(['error' => 'Invalid request'], 400);
    }
}
