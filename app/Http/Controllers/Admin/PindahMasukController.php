<?php

namespace App\Http\Controllers\Admin;

use App\Models\DataDiri;
use App\Models\Aktifitas;
use App\Models\DaerahAsal;
use Illuminate\Support\Str;
use App\Models\DaerahTujuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StatusPengajuan;
use Yajra\DataTables\Facades\DataTables;

class PindahMasukController extends Controller
{
    public function show(Request $request, $id)
    {
        $dataDiri = DataDiri::with('dataKks')->findOrFail($id);

        $daerahAsal = DaerahAsal::where('dataDiri_id', $id)->first();

        $daerahTujuan = DaerahTujuan::where('dataDiri_id', $id)->first();

        // dd($daerahTujuan);

        // return view('pages.admin.detail.pindah-masuk', [
        //     'dataDiri' => $dataDiri,
        //     'dataKK' => $dataDiri,
        //     'daerahTujuan' => $daerahTujuan,
        //     'daerahAsal' => $daerahAsal,
        // ]);
        $prefix = $request->route()->getPrefix();
        switch ($prefix) {
            case '/rt':
                $view = 'pages.admin.rt.detail-pindah-masuk';
                break;
            case '/rw':
                $view = 'pages.admin.rw.detail-pindah-masuk';
                break;
            case '/kelurahan':
                $view = 'pages.admin.kelurahan.detail-pindah-masuk';
                break;
            case '/kecamatan':
                $view = 'pages.admin.kecamatan.detail-pindah-masuk';
                break;
            default:
                abort(404);
        }

        return view($view, [
            'dataDiri' => $dataDiri,
            'dataKK' => $dataDiri,
            'daerahTujuan' => $daerahTujuan,
            'daerahAsal' => $daerahAsal,
        ]);
    }

    public function rt(Request $request)
    {
        $rt_id = session('rt_id');
        if ($request->ajax()) {
            $data = DataDiri::join('statuspengajuans', 'datadiris.id_status_pengajuan', '=', 'statuspengajuans.id')
                ->where('statuspengajuans.nama_status', 'RT')
                ->where('statuspengajuans.jenis', 'pindah masuk')
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
                ->addColumn('action', function ($row) use ($rt_id) {
                    return '
                        <td class="flex items-center justify-center gap-2 p-2">
                            <button class="flex p-1 text-white bg-orange-500 rounded-lg hover:bg-[#AA0000]" onclick="window.location.href=\'' . route('rt.detailPindahMasuk', ['id' => $row->id]) . '\'">
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
            ->where('jenis', 'pindah masuk')
            ->where('created_by', 'RT')
            ->count();

        $ditolak = Aktifitas::where('statusKeputusan', 'Ditolak')
            ->where('jenis', 'pindah masuk')
            ->where('created_by', 'RT')
            ->count();

        return view('pages.admin.rt.pindah-masuk', ['diterima' => $diterima, 'ditolak' => $ditolak]);
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
            'jenis' => 'pindah masuk',
            'catatan' => $validatedData['catatan'] ?? null,
            'created_by' => 'RT',
        ]);

        $StatusPengajuan = StatusPengajuan::where('nama_status', 'RW')
            ->where('jenis', 'pindah masuk')
            ->first()
            ->id;

        $dataDiri->update([
            'id_status_pengajuan' => $StatusPengajuan,
        ]);

        return redirect()->route('rt.pindahMasuk')->with('success', 'Submit berhasil.');
    }

    public function rw(Request $request)
    {
        if ($request->ajax()) {
            $data = DataDiri::join('statuspengajuans', 'datadiris.id_status_pengajuan', '=', 'statuspengajuans.id')
                ->where('statuspengajuans.nama_status', 'RW')
                ->where('statuspengajuans.jenis', 'pindah masuk')
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
                            <button class="flex p-1 text-white bg-orange-500 rounded-lg hover:bg-[#AA0000]" onclick="window.location.href=\'' . route('rw.detailPindahMasuk', ['id' => $row->id]) . '\'">
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
            ->where('jenis', 'pindah masuk')
            ->where('created_by', 'RW')
            ->count();

        $ditolak = Aktifitas::where('statusKeputusan', 'Ditolak')
            ->where('jenis', 'pindah masuk')
            ->where('created_by', 'RW')
            ->count();

        return view('pages.admin.rw.pindah-masuk', ['diterima' => $diterima, 'ditolak' => $ditolak]);
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
            'jenis' => 'pindah masuk',
            'catatan' => $validatedData['catatan'] ?? null,
            'created_by' => 'RW',
        ]);

        $StatusPengajuan = StatusPengajuan::where('nama_status', 'Kelurahan')
            ->where('jenis', 'pindah masuk')
            ->first()
            ->id;

        $dataDiri->update([
            'id_status_pengajuan' => $StatusPengajuan,
        ]);

        return redirect()->route('rw.pindahMasuk')->with('success', 'Submit berhasil.');
    }

    public function kelurahan(Request $request)
    {
        if ($request->ajax()) {
            $data = DataDiri::join('statuspengajuans', 'datadiris.id_status_pengajuan', '=', 'statuspengajuans.id')
                ->where('statuspengajuans.nama_status', 'Kelurahan')
                ->where('statuspengajuans.jenis', 'pindah masuk')
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
                             <button class="flex p-1 text-white bg-orange-500 rounded-lg hover:bg-[#AA0000]" onclick="window.location.href=\'' . route('kelurahan.detailPindahMasuk', ['id' => $row->id]) . '\'">
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
            ->where('jenis', 'pindah masuk')
            ->where('created_by', 'Kelurahan')
            ->count();

        $ditolak = Aktifitas::where('statusKeputusan', 'Ditolak')
            ->where('jenis', 'pindah masuk')
            ->where('created_by', 'Kelurahan')
            ->count();

        return view('pages.admin.kelurahan.pindah-masuk', ['diterima' => $diterima, 'ditolak' => $ditolak]);
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
            'jenis' => 'pindah masuk',
            'catatan' => $validatedData['catatan'] ?? null,
            'created_by' => 'Kelurahan',
        ]);

        $StatusPengajuan = StatusPengajuan::where('nama_status', 'Kecamatan')
            ->where('jenis', 'pindah masuk')
            ->first()
            ->id;

        $dataDiri->update([
            'id_status_pengajuan' => $StatusPengajuan,
        ]);

        return redirect()->route('kelurahan.pindahMasuk')->with('success', 'Submit berhasil.');
    }

    public function kecamatan(Request $request)
    {
        if ($request->ajax()) {
            $data = DataDiri::join('statuspengajuans', 'datadiris.id_status_pengajuan', '=', 'statuspengajuans.id')
                ->where('statuspengajuans.nama_status', 'Kecamatan')
                ->where('statuspengajuans.jenis', 'pindah masuk')
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
                            <button class="flex p-1 text-white bg-orange-500 rounded-lg hover:bg-[#AA0000]" onclick="window.location.href=\'' . route('kecamatan.detailPindahMasuk', ['id' => $row->id]) . '\'">
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
            ->where('jenis', 'pindah masuk')
            ->where('created_by', 'Kecamatan')
            ->count();

        $ditolak = Aktifitas::where('statusKeputusan', 'Ditolak')
            ->where('jenis', 'pindah masuk')
            ->where('created_by', 'Kecamatan')
            ->count();

        return view('pages.admin.kecamatan.pindah-masuk', ['diterima' => $diterima, 'ditolak' => $ditolak]);
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
            'jenis' => 'pindah masuk',
            'catatan' => $validatedData['catatan'] ?? null,
            'created_by' => 'Kecamatan',
        ]);

        $StatusPengajuan = StatusPengajuan::where('nama_status', 'Selesai')
            ->where('jenis', 'pindah masuk')
            ->first()
            ->id;

        $dataDiri->update([
            'id_status_pengajuan' => $StatusPengajuan,
        ]);

        return redirect()->route('kecamatan.pindahMasuk')->with('success', 'Submit berhasil.');
    }
}
