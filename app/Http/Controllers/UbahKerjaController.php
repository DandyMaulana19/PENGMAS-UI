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

        if (auth()->check() && auth()->user()->id != $id) {
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
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = DataDiri::select(['id', 'namaLengkap', 'jenisKelamin', 'tempatLahir', 'tanggalLahir', 'agama', 'pendidikan']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('jenisKelamin', function ($row) {
                    return $row->jenisKelamin == 0 ? 'Laki-laki' : 'Perempuan';
                })
                ->addColumn('tanggalLahir', function ($row) {
                    return \Carbon\Carbon::parse($row->tanggalLahir)->translatedformat('d F Y');
                })
                ->addColumn('action', function ($row) {
                    return '<a href="' . url('/warga/form-pekerjaan/' . $row->id) . '" class="text-xs px-3 py-1.5 bg-[#9B1010] text-white rounded">Ajukan</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }
}
