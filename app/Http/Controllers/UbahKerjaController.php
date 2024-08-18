<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDiri;
use App\Models\StatusPekerjaan;


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
        // dd($dataDiri);
        return view('pages.pengajuanPekerjaan', ['dataDiri' => $dataDiri]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status_pekerjaan' => 'required|string',
            'nama_instansi' => 'nullable|string|max:255',
            'alamat_instansi' => 'nullable|string|max:255',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
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

        $dataDiri->statusPekerjaan = $request->status_pekerjaan;
        $dataDiri->save();
        dd($dataDiri);
        die();
        return redirect()->route('form-pekerjaan', ['id' => $dataDiri->id])
            ->with('success', 'Status pekerjaan updated successfully.');
    }

}
