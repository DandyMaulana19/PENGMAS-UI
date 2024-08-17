<?php

namespace App\Http\Controllers;

use App\Models\DaerahTujuan;
use App\Models\DataDiri;
use Illuminate\Http\Request;

class PindahMasukController extends Controller
{
    public function index()
    {
        $datadiri = DataDiri::all();
        return view('pages.pindah-masuk', ['datadiri' => $datadiri]);
    }

    public function tambahData()
    {
        $datadiri = DaerahTujuan::all();
        return view('pages.tambahData', ['datadiri' => $datadiri]);
    }
}
