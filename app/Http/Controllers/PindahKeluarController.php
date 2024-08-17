<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDiri;
use Illuminate\Support\Facades\DB;

class PindahKeluarController extends Controller
{
    public function index()
    {
        $datadiri = DataDiri::all();
        return view('pages.pindah-keluar', ['datadiri' => $datadiri]);
    }
    public function form()
    {
        $datadiri = DB::table('datadiris')
            ->join('datadiri_datakks', 'datadiris.id', '=', 'datadiri_datakks.dataDiri_id')
            ->join('datakks', 'datadiri_datakks.dataKk_id', '=', 'datakks.id')
            ->select('datadiris.*', 'datakks.no_kk')
            ->get();

        return view('pages.pengajuanPermohonan', ['datadiri' => $datadiri]);
    }
}
