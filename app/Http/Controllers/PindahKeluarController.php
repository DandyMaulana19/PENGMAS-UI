<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDiri;

class PindahKeluarController extends Controller
{
    public function index()
    {
        $datadiri = DataDiri::all();
        return view('pages.pindah-keluar', ['datadiri' => $datadiri]);
    }
    public function form()
    {
        $datadiri = DataDiri::all();
        return view('pages.pengajuanPermohonan', ['datadiri' => $datadiri]);
    }
}
