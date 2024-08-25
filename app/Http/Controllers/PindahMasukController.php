<?php

namespace App\Http\Controllers;

use App\Models\DaerahTujuan;
use App\Models\DataDiri;
use App\Models\StatusPekerjaan;
use App\Models\StatusPengajuan;
use App\Models\DaerahAsal;
use App\Models\DataDiriDataKK;
use App\Models\DataKK;
use App\Models\RT;
use App\Models\User;
use App\Models\Aktifitas;
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

        $dataDiri = DataDiri::where('id_user', $user->id)
            ->with('dataKks')
            ->firstOrFail();

        $daerahTujuan = DaerahTujuan::where('dataDiri_id', $dataDiri->id)->first();

        $existingPengajuan = $dataDiri->dataKks->first();

        return view('pages.tambahData', [
            'id' => $user,
            'dataDiri' => $dataDiri,
            'daerahTujuan' => $daerahTujuan,
            'existingPengajuan' => $existingPengajuan,
        ]);
    }

    public function store(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'no_kk' => 'required|string|max:16',
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
            'alamatTujuan' => 'required|string|max:255',
            'rtTujuan' => 'required|string|max:5',
            'rwTujuan' => 'required|string|max:5',
            'kelurahanTujuan' => 'required|string|max:255',
            'kecamatanTujuan' => 'required|string|max:255',
            'kabupatenTujuan' => 'required|string|max:255',
            'provinsiTujuan' => 'required|string|max:255',
        ]);

        $namaPekerjaan = $request->status_pekerjaan === 'Belum Bekerja' ? '' : $request->input('namaPekerjaan', '');
        $alamatPekerjaan = $request->status_pekerjaan === 'Belum Bekerja' ? '' : $request->input('alamatPekerjaan', '');

        $statusPengajuan = StatusPengajuan::where('nama_status', 'RT')->first();
        if (!$statusPengajuan) {
            $statusPengajuan = StatusPengajuan::create(['nama_status' => 'RT']);
        }

        $dataDiri = DataDiri::create([
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
            'id_status_pengajuan' => $statusPengajuan->id,
            'id_user' => $user->id,
        ]);

        DaerahAsal::create([
            'dataDiri_id' => $dataDiri->id,
            'alamat' => $validatedData['alamatAsal'],
            'namaRt' => $validatedData['rtAsal'],
            'namaRw' => $validatedData['rwAsal'],
            'namaKelurahan' => $validatedData['kelurahanAsal'],
            'namaKecamatan' => $validatedData['kecamatanAsal'],
            'namaKabupaten' => $validatedData['kabupatenAsal'],
            'namaProvinsi' => $validatedData['provinsiAsal'],
        ]);

        DaerahTujuan::create([
            'dataDiri_id' => $dataDiri->id,
            'alamat' => $validatedData['alamatTujuan'],
            'namaRt' => $validatedData['rtTujuan'],
            'namaRw' => $validatedData['rwTujuan'],
            'namaKelurahan' => $validatedData['kelurahanTujuan'],
            'namaKecamatan' => $validatedData['kecamatanTujuan'],
            'namaKabupaten' => $validatedData['kabupatenTujuan'],
            'namaProvinsi' => $validatedData['provinsiTujuan'],
        ]);

        Aktifitas::create([
            'id' => Str::uuid(),
            'user_id' => $dataDiri->id_user,
            'statusKeputusan' => 'Di ajukan',
            'statusPengajuan' => 'Menunggu Persetujuan',
            'jenis' => 'Pindah Masuk',
            'catatan' => '',
            'created_by' => $dataDiri->namaLengkap,
        ]);

        $rt_ID = RT::where('nama', $validatedData['rtTujuan'])->first();

        $dataKk = DataKK::create([
            'id' => Str::uuid(),
            'alamat' => $validatedData['alamatAsal'],
            'no_kk' => $validatedData['no_kk'],
            'rt_id' => $rt_ID->id,
        ]);

        DataDiriDataKK::create([
            'dataDiri_id' => $dataDiri->id,
            'dataKk_id' => $dataKk->id,
        ]);

        return redirect('/warga/dashboard/' . $id)->with('success', 'Form Data KK Baru berhasil diisi.');
    }

    public function update(Request $request, $id)
    {
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
            'alamatTujuan' => 'required|string|max:255',
            'rtTujuan' => 'required|string|max:10',
            'rwTujuan' => 'required|string|max:10',
            'kelurahanTujuan' => 'required|string|max:100',
            'kecamatanTujuan' => 'required|string|max:100',
            'kabupatenTujuan' => 'required|string|max:100',
            'provinsiTujuan' => 'required|string|max:100',
        ]);

        $namaPekerjaan = $request->status_pekerjaan === 'Belum Bekerja' ? '' : $request->input('namaPekerjaan', '');
        $alamatPekerjaan = $request->status_pekerjaan === 'Belum Bekerja' ? '' : $request->input('alamatPekerjaan', '');

        $statusPengajuan = StatusPengajuan::where('nama_status', 'RT')->first();
        if (!$statusPengajuan) {
            $statusPengajuan = StatusPengajuan::create(['nama_status' => 'RT']);
        }

        $dataDiri = DataDiri::create([
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
            'id_status_pengajuan' => $statusPengajuan->id,
            'id_user' => $user->id,
        ]);

        DaerahAsal::create([
            'dataDiri_id' => $dataDiri->id,
            'alamat' => $validatedData['alamatAsal'],
            'namaRt' => $validatedData['rtAsal'],
            'namaRw' => $validatedData['rwAsal'],
            'namaKelurahan' => $validatedData['kelurahanAsal'],
            'namaKecamatan' => $validatedData['kecamatanAsal'],
            'namaKabupaten' => $validatedData['kabupatenAsal'],
            'namaProvinsi' => $validatedData['provinsiAsal'],
        ]);

        DaerahTujuan::create([
            'dataDiri_id' => $dataDiri->id,
            'alamat' => $validatedData['alamatTujuan'],
            'namaRt' => $validatedData['rtTujuan'],
            'namaRw' => $validatedData['rwTujuan'],
            'namaKelurahan' => $validatedData['kelurahanTujuan'],
            'namaKecamatan' => $validatedData['kecamatanTujuan'],
            'namaKabupaten' => $validatedData['kabupatenTujuan'],
            'namaProvinsi' => $validatedData['provinsiTujuan'],
        ]);

        Aktifitas::create([
            'id' => Str::uuid(),
            'user_id' => $dataDiri->id_user,
            'statusKeputusan' => 'Di ajukan',
            'statusPengajuan' => 'Menunggu Persetujuan',
            'jenis' => 'Pindah Masuk',
            'catatan' => '',
            'created_by' => $dataDiri->namaLengkap,
        ]);

        $existingDataDiri = DataDiri::where('id_user', $user->id)
            ->whereHas('dataKks')
            ->with('dataKks')
            ->first();

        if ($existingDataDiri) {
            $existingDataKk = $existingDataDiri->dataKks->first();

            if ($existingDataKk) {
                DataDiriDataKK::create([
                    'dataDiri_id' => $dataDiri->id,
                    'dataKk_id' => $existingDataKk->id,
                ]);
            }
        }

        return redirect('/warga/dashboard/' . $id)->with('success', 'Form berhasil diisi.');
    }

    public function showKK($id)
    {
        $user = User::findOrFail($id);

        $dataDiri = DataDiri::where('id_user', $user->id)
            ->first();


        return view('pages.pengajuanKK', [
            'id' => $user,
            'dataDiri' => $dataDiri,
        ]);
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $userId = auth()->id();

            $data = DataDiri::where('id_user', $userId)
                ->select(['id', 'nik', 'namaLengkap', 'jenisKelamin', 'tempatLahir', 'tanggalLahir', 'agama', 'pendidikan']);

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

    public function getDetail($jenis, $id)
    {

        if ($jenis == "pindah masuk") {

            $user = User::findOrFail($id);
            $dataDiri = DataDiri::where('id_user', $id)->first();
            $idUser = $dataDiri->id;

            $dataKK = DataDiri::with(['dataKks' => function ($query) {
                $query->select('no_kk');
            }])->find($dataDiri->id);

            $daerahAsal = DaerahAsal::where('dataDiri_id', $idUser)->first();
            $daerahTujuan = DaerahTujuan::where('dataDiri_id', $idUser)->first();

            $catatan = Aktifitas::where('jenis', $jenis)
                ->where('id', $id)
                ->pluck('catatan')
                ->first();
            // dd($daerahTujuan);
            // dd($daerahAsal);


            return view('pages.detailPengajuanSurat.detailPengajuanPindahMasuk', [
                'id' => $user,
                'dataDiri' => $dataDiri,
                'daerahAsal' => $daerahAsal,
                'daerahTujuan' => $daerahTujuan,
                'dataKK' => $dataKK,
                'catatan' => $catatan
            ]);
        } else if ($jenis == "pindah keluar") {

            $user = User::findOrFail($id);
            $dataDiri = DataDiri::where('id_user', $id)->first();
            $idUser = $dataDiri->id;

            $dataKK = DataDiri::with(['dataKks' => function ($query) {
                $query->select('no_kk');
            }])->find($dataDiri->id);

            $daerahAsal = DaerahAsal::where('dataDiri_id', $idUser)->first();
            $daerahTujuan = DaerahTujuan::where('dataDiri_id', $idUser)->first();

            $catatan = Aktifitas::where('jenis', $jenis)
                ->where('id', $id)
                ->pluck('catatan')
                ->first();
            // dd($daerahTujuan);
            // dd($daerahAsal);

            return view('pages.detailPengajuanSurat.detailPengajuanPindahKeluar', [
                'id' => $user,
                'dataDiri' => $dataDiri,
                'daerahAsal' => $daerahAsal,
                'daerahTujuan' => $daerahTujuan,
                'dataKK' => $dataKK,
                'catatan' => $catatan
            ]);
        } else {
            $user = User::findOrFail($id);
            $dataDiri = DataDiri::where('id_user', $id)->first();
            $idUser = $dataDiri->id;
            $idStatusPekerjaan = $dataDiri->id_status_pekerjaan;

            $dataKK = DataDiri::with(['dataKks' => function ($query) {
                $query->select('no_kk');
            }])->find($dataDiri->id);

            $statusPekerjaan = StatusPekerjaan::where('id', $idStatusPekerjaan)->first();
            $daerahTujuan = DaerahTujuan::where('dataDiri_id', $idUser)->first();

            $catatan = Aktifitas::where('jenis', $jenis)
                ->where('id', $id)
                ->pluck('catatan')
                ->first();
            // dd($daerahTujuan);
            // dd($daerahAsal);


            return view('pages.detailPengajuanSurat.detailPengajuanPekerjaan', [
                'id' => $user,
                'dataDiri' => $dataDiri,
                'daerahTujuan' => $daerahTujuan,
                'dataKK' => $dataKK,
                'statusPekerjaan' => $statusPekerjaan,
                'catatan' => $catatan
            ]);
        }
    }
}
