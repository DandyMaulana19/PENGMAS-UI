<?php

namespace App\Http\Controllers\Admin;

use App\Models\DataDiri;
use App\Models\Aktifitas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class PindahKeluarController extends Controller
{
    public function show(Request $request, $id)
    {
        $dataDiri = DataDiri::with('dataKks', 'daerahTujuans', 'statusPekerjaan')->findOrFail($id);

        $dataKK = $dataDiri->dataKks->first();

        $daerahTujuan = $dataDiri->daerahTujuans->first();

        $statusPekerjaan = $dataDiri->statusPekerjaan;

        $prefix = $request->route()->getPrefix();
        switch ($prefix) {
            case '/rt':
                $view = 'pages.admin.rt.detail-pindah-keluar';
                break;
            case '/rw':
                $view = 'pages.admin.rw.detail-pindah-keluar';
                break;
            case '/kelurahan':
                $view = 'pages.admin.kelurahan.detail-pindah-keluar';
                break;
            case '/kecamatan':
                $view = 'pages.admin.kecamatan.detail-pindah-keluar';
                break;
            default:
                abort(404);
        }

        return view($view, [
            'dataDiri' => $dataDiri,
            'dataKK' => $dataKK,
            'daerahTujuan' => $daerahTujuan,
            'statusPekerjaan' => $statusPekerjaan,
        ]);
    }

    public function rt(Request $request)
    {
        if ($request->ajax()) {
            $data = DataDiri::join('statuspengajuans', 'datadiris.id_status_pengajuan', '=', 'statuspengajuans.id')
                ->where('statuspengajuans.nama_status', 'RT')
                ->where('statuspengajuans.jenis', 'pindah keluar')
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
                        <button class="flex p-1 text-white bg-orange-500 rounded-lg hover:bg-[#AA0000]" onclick="window.location.href=\'' . route('rt.detailPindahKeluar', ['id' => $row->id]) . '\'">
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

        $diterima = Aktifitas::where('statusKeputusan', 'Disetujui')
            ->where('jenis', 'pindah keluar')
            ->where('created_by', 'RT')
            ->count();

        $ditolak = Aktifitas::where('statusKeputusan', 'Ditolak')
            ->where('jenis', 'pindah keluar')
            ->where('created_by', 'RT')
            ->count();

        return view('pages.admin.rt.pindah-keluar', ['diterima' => $diterima, 'ditolak' => $ditolak]);
        // return response()->json(['error' => 'Invalid request'], 400);
    }

    public function storeRt(Request $request, $id)
    {
        $validatedData = $request->validate([
            'statusKeputusan' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $dataDiri = DataDiri::find($id);

        if (!$dataDiri) {
            return redirect()->back()->withErrors(['Data Diri tidak ditemukan']);
        }

        $statusKeputusan = $validatedData['statusKeputusan'];
        $statusPengajuan = $statusKeputusan === 'Disetujui' ? 'RW' : 'Ditolak';

        Aktifitas::create([
            'id' => Str::uuid(),
            'user_id' => $dataDiri->id_user,
            'statusKeputusan' => $statusKeputusan,
            'statusPengajuan' => $statusPengajuan,
            'jenis' => 'pindah keluar',
            'catatan' => $validatedData['catatan'] ?? null,
            'created_by' => 'RT',
        ]);

        $dataDiri->statusPengajuan->update([
            'nama_status' => $statusPengajuan,
        ]);

        return redirect()->route('rt.pindahKeluar')->with('success', 'Submit berhasil.');
    }

    public function rw(Request $request)
    {
        if ($request->ajax()) {
            $data = DataDiri::join('statuspengajuans', 'datadiris.id_status_pengajuan', '=', 'statuspengajuans.id')
                ->where('statuspengajuans.nama_status', 'RW')
                ->where('statuspengajuans.jenis', 'pindah keluar')
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
                        <button class="flex p-1 text-white bg-orange-500 rounded-lg hover:bg-[#AA0000]" onclick="window.location.href=\'' . route('rw.detailPindahKeluar', ['id' => $row->id]) . '\'">
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

        $diterima = Aktifitas::where('statusKeputusan', 'Disetujui')
            ->where('jenis', 'pindah keluar')
            ->where('created_by', 'RW')
            ->count();

        $ditolak = Aktifitas::where('statusKeputusan', 'Ditolak')
            ->where('jenis', 'pindah keluar')
            ->where('created_by', 'RW')
            ->count();

        return view('pages.admin.rw.pindah-keluar', ['diterima' => $diterima, 'ditolak' => $ditolak]);
        // return response()->json(['error' => 'Invalid request'], 400);
    }

    public function storeRw(Request $request, $id)
    {
        $validatedData = $request->validate([
            'statusKeputusan' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $dataDiri = DataDiri::find($id);

        if (!$dataDiri) {
            return redirect()->back()->withErrors(['Data Diri tidak ditemukan']);
        }

        $statusKeputusan = $validatedData['statusKeputusan'];
        $statusPengajuan = $statusKeputusan === 'Disetujui' ? 'Kelurahan' : 'Ditolak';

        Aktifitas::create([
            'id' => Str::uuid(),
            'user_id' => $dataDiri->id_user,
            'statusKeputusan' => $statusKeputusan,
            'statusPengajuan' => $statusPengajuan,
            'jenis' => 'pindah keluar',
            'catatan' => $validatedData['catatan'] ?? null,
            'created_by' => 'RW',
        ]);

        $dataDiri->statusPengajuan->update([
            'nama_status' => $statusPengajuan,
        ]);

        return redirect()->route('rw.pindahKeluar')->with('success', 'Submit berhasil.');
    }
    public function kelurahan(Request $request)
    {
        if ($request->ajax()) {
            $data = DataDiri::join('statuspengajuans', 'datadiris.id_status_pengajuan', '=', 'statuspengajuans.id')
                ->where('statuspengajuans.nama_status', 'Kelurahan')
                ->where('statuspengajuans.jenis', 'pindah keluar')
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
                        <button class="flex p-1 text-white bg-orange-500 rounded-lg hover:bg-[#AA0000]" onclick="window.location.href=\'' . route('kelurahan.detailPindahKeluar', ['id' => $row->id]) . '\'">
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
        $diterima = Aktifitas::where('statusKeputusan', 'Disetujui')
            ->where('jenis', 'pindah keluar')
            ->where('created_by', 'Kelurahan')
            ->count();

        $ditolak = Aktifitas::where('statusKeputusan', 'Ditolak')
            ->where('jenis', 'pindah keluar')
            ->where('created_by', 'Kelurahan')
            ->count();

        return view('pages.admin.kelurahan.pindah-keluar', ['diterima' => $diterima, 'ditolak' => $ditolak]);
        // return response()->json(['error' => 'Invalid request'], 400);
    }

    public function storeKel(Request $request, $id)
    {
        $validatedData = $request->validate([
            'statusKeputusan' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $dataDiri = DataDiri::find($id);

        if (!$dataDiri) {
            return redirect()->back()->withErrors(['Data Diri tidak ditemukan']);
        }

        $statusKeputusan = $validatedData['statusKeputusan'];
        $statusPengajuan = $statusKeputusan === 'Disetujui' ? 'Kecamatan' : 'Ditolak';

        Aktifitas::create([
            'id' => Str::uuid(),
            'user_id' => $dataDiri->id_user,
            'statusKeputusan' => $statusKeputusan,
            'statusPengajuan' => $statusPengajuan,
            'jenis' => 'pindah keluar',
            'catatan' => $validatedData['catatan'] ?? null,
            'created_by' => 'Kelurahan',
        ]);

        $dataDiri->statusPengajuan->update([
            'nama_status' => $statusPengajuan,
        ]);

        return redirect()->route('kelurahan.pindahKeluar')->with('success', 'Submit berhasil.');
    }

    public function kecamatan(Request $request)
    {
        if ($request->ajax()) {
            $data = DataDiri::join('statuspengajuans', 'datadiris.id_status_pengajuan', '=', 'statuspengajuans.id')
                ->where('statuspengajuans.nama_status', 'Kecamatan')
                ->where('statuspengajuans.jenis', 'pindah keluar')
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
                        <button class="flex p-1 text-white bg-orange-500 rounded-lg hover:bg-[#AA0000]" onclick="window.location.href=\'' . route('kecamatan.detailPindahKeluar', ['id' => $row->id]) . '\'">
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

        $diterima = Aktifitas::where('statusKeputusan', 'Disetujui')
            ->where('jenis', 'pindah keluar')
            ->where('created_by', 'Kecamatan')
            ->count();

        $ditolak = Aktifitas::where('statusKeputusan', 'Ditolak')
            ->where('jenis', 'pindah keluar')
            ->where('created_by', 'Kecamatan')
            ->count();

        return view('pages.admin.kecamatan.pindah-keluar', ['diterima' => $diterima, 'ditolak' => $ditolak]);
        // return response()->json(['error' => 'Invalid request'], 400);
    }

    public function storeKec(Request $request, $id)
    {
        $validatedData = $request->validate([
            'statusKeputusan' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $dataDiri = DataDiri::find($id);

        if (!$dataDiri) {
            return redirect()->back()->withErrors(['Data Diri tidak ditemukan']);
        }

        $statusKeputusan = $validatedData['statusKeputusan'];
        $statusPengajuan = $statusKeputusan === 'Disetujui' ? 'Selesai' : 'Ditolak';

        Aktifitas::create([
            'id' => Str::uuid(),
            'user_id' => $dataDiri->id_user,
            'statusKeputusan' => $statusKeputusan,
            'statusPengajuan' => $statusPengajuan,
            'jenis' => 'pindah keluar',
            'catatan' => $validatedData['catatan'] ?? null,
            'created_by' => 'Kecamatan',
        ]);

        $dataDiri->statusPengajuan->update([
            'nama_status' => $statusPengajuan,
        ]);

        return redirect()->route('kecamatan.pindahKeluar')->with('success', 'Submit berhasil.');
    }
}
