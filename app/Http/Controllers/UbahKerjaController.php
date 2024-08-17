<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDiri;

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
        return view('pages.pengajuanPekerjaan', ['dataDiri' => $dataDiri]);
    }
}
