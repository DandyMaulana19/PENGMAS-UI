<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDiri;
use App\Models\StatusPekerjaan;
use App\Models\StatusPengajuan;

class UbahKerjaController extends Controller
{
    public function index()
    {
        $dataDiri = DataDiri::all();
        return view('pages.ubah-kerja', ['dataDiri' => $dataDiri]);
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

        if (!$statusPengajuan) {
            $statusPengajuan = StatusPengajuan::create(['nama_status' => 'RT']);
        }

        $dataDiri->id_status_pengajuan = $statusPengajuan->id;

        $dataDiri->save();

        return redirect('/warga/ubah-pekerjaan')->with('success', 'Data pekerjaan berhasil diperbarui!');
    }

}
