<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDiri;
use App\Models\DaerahTujuan;
use App\Models\StatusPengajuan;
use App\Models\User;

class PindahKeluarController extends Controller
{
    public function index($id)
    {
        session(['idUser' => $id]);

        $user = User::findOrFail($id);
        $dataDiri = DataDiri::all();

        if (auth()->user()->id != $id) {
            return redirect('/warga/dashboard/' . auth()->user()->id)->withErrors('Unauthorized access.');
        }

        return view('pages.pindah-keluar', ['datadiri' => $dataDiri, 'id' => $user]);
    }

    public function show($id)
    {
        $datadiri = DataDiri::with('dataKks')->findOrFail($id);

        $existingPengajuan = $datadiri->statusPengajuan()
            ->whereIn('nama_status', ['RT', 'RW', 'Kelurahan', 'Kecamatan'])
            ->exists();

        return view('pages.pengajuanPermohonan', [
            'datadiri' => $datadiri,
            'existingPengajuan' => $existingPengajuan,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'alamat' => 'required|string|max:255',
            'namaRt' => 'required|string|max:255',
            'namaRw' => 'required|string|max:255',
            'namaKelurahan' => 'required|string|max:255',
            'namaKecamatan' => 'required|string|max:255',
            'namaKabupaten' => 'required|string|max:255',
            'namaProvinsi' => 'required|string|max:255',
        ]);

        $dataDiri = DataDiri::findOrFail($id);
        $daerahTujuan = DaerahTujuan::where('dataDiri_id', $id)->first();

        $statusPengajuan = StatusPengajuan::where('nama_status', 'RT')->first();

        if (!$statusPengajuan) {
            $statusPengajuan = StatusPengajuan::create(['nama_status' => 'RT']);
        }

        $dataDiri->id_status_pengajuan = $statusPengajuan->id;
        $dataDiri->save();

        if ($daerahTujuan) {
            $daerahTujuan->update($validatedData);
        } else {
            $validatedData['dataDiri_id'] = $id;
            DaerahTujuan::create($validatedData);
        }

        $idUser = session('idUser');

        return redirect('/warga/dashboard/' . $idUser)->with('success', 'Form berhasil diisi.');
        // return redirect('/warga/pindah-keluar')->with('success', 'Permohonan pindah keluar ditambahkan');
    }
}
