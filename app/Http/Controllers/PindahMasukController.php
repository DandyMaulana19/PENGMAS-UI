<?php

namespace App\Http\Controllers;

use App\Models\DaerahTujuan;
use App\Models\DataDiri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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

    public function tambahData($id)
    {
        $datadiri = DaerahTujuan::all();
        return view('pages.tambahData', ['datadiri' => $datadiri]);
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
            $data = DataDiri::select(['id', 'namaLengkap', 'jenisKelamin', 'tempatLahir', 'tanggalLahir', 'agama', 'pendidikan']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('jenisKelamin', function ($row) {
                    return $row->jenisKelamin == 0 ? 'Laki-laki' : 'Perempuan';
                })
                ->addColumn('tanggalLahir', function ($row) {
                    return \Carbon\Carbon::parse($row->tanggalLahir)->translatedformat('d F Y');
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }
}
