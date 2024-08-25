<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDiri;
use App\Models\DaerahTujuan;
use App\Models\StatusPengajuan;
use App\Models\User;
use App\Models\Aktifitas;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class PindahKeluarController extends Controller
{
    public function index($id)
    {
        session(['idUser' => $id]);

        $user = User::findOrFail($id);
        $dataDiri = DataDiri::all();

        if (auth()->check() && auth()->user()->id != $id) {
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

        Aktifitas::create([
            'id' => Str::uuid(),
            'user_id' => $dataDiri->id_user,
            'statusKeputusan' => 'Di ajukan',
            'statusPengajuan' => 'Menunggu Persetujuan',
            'jenis' => 'Pindah Keluar',
            'catatan' => '',
            'created_by' => $dataDiri->namaLengkap,
        ]);

        $idUser = session('idUser');

        return redirect('/warga/dashboard/' . $idUser)->with('success', 'Form berhasil diisi.');
        // return redirect('/warga/pindah-keluar')->with('success', 'Permohonan pindah keluar ditambahkan');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $userId = auth()->id();

            $data = DataDiri::where('id_user', $userId)
                ->select(['id', 'namaLengkap', 'jenisKelamin', 'tempatLahir', 'tanggalLahir', 'agama', 'pendidikan']);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('jenisKelamin', function ($row) {
                    return $row->jenisKelamin == 0 ? 'Laki-laki' : 'Perempuan';
                })
                ->addColumn('tanggalLahir', function ($row) {
                    return \Carbon\Carbon::parse($row->tanggalLahir)->translatedformat('d F Y');
                })
                ->addColumn('action', function ($row) {
                    return '<a href="' . url('/warga/form-pindah-keluar/' . $row->id) . '" class="text-xs px-3 py-1.5 bg-[#9B1010] text-white rounded">Ajukan</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }
}
