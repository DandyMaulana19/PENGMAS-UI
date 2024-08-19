<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDiri;
use App\Models\StatusPekerjaan;
use App\Models\StatusPengajuan;
use App\Models\User;
use Yajra\DataTables\DataTables;

class UbahKerjaController extends Controller
{
    public function index($id)
    {
        session(['idUser' => $id]);

        $user = User::findOrFail($id);
        $dataDiri = DataDiri::all();

        if (auth()->user()->id != $id) {
            return redirect('/warga/dashboard/' . auth()->user()->id)->withErrors('Unauthorized access.');
        }

        return view('pages.ubah-kerja', ['dataDiri' => $dataDiri, 'id' => $user]);
    }

    public function show($id)
    {
        $dataDiri = DataDiri::where('id', $id)->firstOrFail();

        $pendingPengajuan = StatusPengajuan::whereIn('nama_status', ['RT', 'RW', 'Kelurahan', 'Kecamatan'])
            ->where('id', $dataDiri->id_status_pengajuan)
            ->exists();

        return view('pages.pengajuanPekerjaan', [
            'dataDiri' => $dataDiri,
            'pendingPengajuan' => $pendingPengajuan,
        ]);
    }


    public function getData(Request $request)
    {
        $searchValue = $request->input('search')['value']; // Get search value from DataTables

        $dataDiri = Datadiri::join('datadiri_datakks', 'datadiris.id', '=', 'datadiri_datakks.dataDiri_id')
            ->join('data_kks', 'datadiri_datakks.dataKk_id', '=', 'data_kks.id')
            ->select([
                'datadiris.id',
                'datadiris.namaLengkap',
                'datadiris.jenisKelamin',
                'datadiris.tempatLahir',
                'datadiris.tanggalLahir',
                'datadiris.agama',
                'datadiris.pendidikan',
                'data_kks.no_kk'
            ])
            ->where('data_kks.no_kk', 'like', "%{$searchValue}%"); // Filter by nomor KK

        return DataTables::of($dataDiri)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '<a href="' . url('/warga/form-pekerjaan/' . $row->id) . '" class="px-3 py-2 bg-[#9B1010] rounded">Ajukan</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }




    public function update(Request $request, $id)
    {
        $request->validate([
            'status_pekerjaan' => 'required|string',
            'nama_instansi' => 'nullable|string|max:255',
            'alamat_instansi' => 'nullable|string|max:255',
        ]);

        $dataDiri = Datadiri::findOrFail($id);

        $belumBekerjaId = StatusPekerjaan::where('nama_status', 'Belum Bekerja')->first()->id;
        $sudahBekerjaId = StatusPekerjaan::where('nama_status', 'Sudah Bekerja')->first()->id;

        if ($request->status_pekerjaan == 'Belum Bekerja') {
            $dataDiri->namaPekerjaan = '';
            $dataDiri->alamatPekerjaan = '';
            $dataDiri->id_status_pekerjaan = $belumBekerjaId;
        } else {
            $dataDiri->namaPekerjaan = $request->nama_instansi;
            $dataDiri->alamatPekerjaan = $request->alamat_instansi;
            $dataDiri->id_status_pekerjaan = $sudahBekerjaId;
        }

        $statusPengajuan = StatusPengajuan::where('nama_status', 'RT')->first();

        // dd($statusPengajuan);

        if (!$statusPengajuan) {
            $statusPengajuan = StatusPengajuan::create(['nama_status' => 'RT']);
        }

        $dataDiri->id_status_pengajuan = $statusPengajuan->id;

        $dataDiri->save();

        $idUser = session('idUser');

        return redirect('/warga/dashboard/' . $idUser)->with('success', 'Form berhasil diisi.');
    }
}
