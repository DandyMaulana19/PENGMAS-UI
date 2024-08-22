<?php

namespace App\Http\Controllers;

use App\Models\DaerahTujuan;
use App\Models\DataDiri;
use App\Models\StatusPekerjaan;
use App\Models\StatusPengajuan;
use App\Models\DaerahAsal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class PindahMasukController extends Controller
{
    public function index($id)
    {
        session(['idUser' => $id]);

        $user = User::findOrFail($id);
        $datadiri = DataDiri::all();

        if (auth()->check() && auth()->user()->id != $id) {
            return redirect('/warga/dashboard/' . auth()->user()->id)->withErrors('Unauthorized access.');
        }

        return view('pages.pindah-masuk', ['datadiri' => $datadiri, 'id' => $user]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        $dataDiri = DataDiri::where('id_user', $user->id)->with('dataKks')->firstOrFail();

        $daerahTujuan = DaerahTujuan::where('dataDiri_id', $dataDiri->id)->first();

        return view('pages.tambahData', [
            'id' => $user,
            'dataDiri' => $dataDiri,
            'daerahTujuan' => $daerahTujuan,
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'nik' => 'required|string|max:16',
            'namaLengkap' => 'required|string|max:255',
            'jenisKelamin' => 'required|integer',
            'tempatLahir' => 'required|string|max:255',
            'tanggalLahir' => 'required|date',
            'agama' => 'required|string|max:50',
            'pendidikan' => 'required|string|max:100',
            'status_pekerjaan' => 'required|string|max:100',
            'namaPekerjaan' => 'nullable|string|max:255',
            'alamatPekerjaan' => 'nullable|string|max:255',
            'alamatAsal' => 'required|string|max:255',
            'rtAsal' => 'required|string|max:10',
            'rwAsal' => 'required|string|max:10',
            'kelurahanAsal' => 'required|string|max:100',
            'kecamatanAsal' => 'required|string|max:100',
            'kabupatenAsal' => 'required|string|max:100',
            'provinsiAsal' => 'required|string|max:100',
        ]);

        $namaPekerjaan = $request->status_pekerjaan === 'Belum Bekerja' ? '' : $request->input('namaPekerjaan', '');
        $alamatPekerjaan = $request->status_pekerjaan === 'Belum Bekerja' ? '' : $request->input('alamatPekerjaan', '');

        $dataDiri = DataDiri::updateOrCreate(
            ['id_user' => $user->id],
            [
                'id' => Str::uuid(),
                'nik' => $validatedData['nik'],
                'namaLengkap' => $validatedData['namaLengkap'],
                'jenisKelamin' => (int) $validatedData['jenisKelamin'],
                'tempatLahir' => $validatedData['tempatLahir'],
                'tanggalLahir' => $validatedData['tanggalLahir'],
                'agama' => $validatedData['agama'],
                'pendidikan' => $validatedData['pendidikan'],
                'namaPekerjaan' => $namaPekerjaan,
                'alamatPekerjaan' => $alamatPekerjaan,
                'id_status_pekerjaan' => $request->status_pekerjaan === 'Belum Bekerja' ?
                    StatusPekerjaan::where('nama_status', 'Belum Bekerja')->first()->id :
                    StatusPekerjaan::where('nama_status', 'Sudah Bekerja')->first()->id,
                'id_user' => $user->id,
            ]
        );

        DaerahAsal::updateOrCreate(
            ['dataDiri_id' => $dataDiri->id],
            [
                'alamat' => $validatedData['alamatAsal'],
                'namaRt' => $validatedData['rtAsal'],
                'namaRw' => $validatedData['rwAsal'],
                'namaKelurahan' => $validatedData['kelurahanAsal'],
                'namaKecamatan' => $validatedData['kecamatanAsal'],
                'namaKabupaten' => $validatedData['kabupatenAsal'],
                'namaProvinsi' => $validatedData['provinsiAsal'],
            ]
        );

        $statusPengajuan = StatusPengajuan::where('nama_status', 'RT')->first();

        if (!$statusPengajuan) {
            $statusPengajuan = StatusPengajuan::create(['nama_status' => 'RT']);
        }

        $dataDiri->id_status_pengajuan = $statusPengajuan->id;
        $dataDiri->save();

        return redirect('/warga/dashboard/' . $id)->with('success', 'Form berhasil diisi.');
    }




    public function kkBaru($id)
    {
        session(['idUser' => $id]);

        $user = User::findOrFail($id);
        // $daerahTujuan = DaerahTujuan::where('dataDiri_id', $id)->get();
        $daerahTujuan = DB::table('users')
            ->join('datadiris', 'users.id', '=', 'datadiris.id_user')
            ->join('daerahtujuans', 'datadiris.id', '=', 'daerahtujuans.dataDiri_id')
            ->select('daerahtujuans.*')
            ->where('users.id', $id)
            ->get();
        $datadiri = DataDiri::all();
        if (auth()->user()->id != $id) {
            return redirect('/warga/dashboard/' . auth()->user()->id)->withErrors('Unauthorized access.');
        }
        // dd($daerahTujuan);

        return view('pages.tambahData', ['datadiri' => $datadiri, 'id' => $user, 'daerahTujuan' => $daerahTujuan]);
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = DataDiri::select(['id', 'nik', 'namaLengkap', 'jenisKelamin', 'tempatLahir', 'tanggalLahir', 'agama', 'pendidikan']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('jenisKelamin', function ($row) {
                    return $row->jenisKelamin == 0 ? 'Laki-laki' : 'Perempuan';
                })
                ->addColumn('tanggalLahir', function ($row) {
                    return \Carbon\Carbon::parse($row->tanggalLahir)->translatedformat('d F Y');
                })
                ->addColumn('status', function ($row) {
                    return 'Pending';
                })
                ->make(true);
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }
}
