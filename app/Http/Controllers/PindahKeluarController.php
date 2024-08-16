<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PindahKeluarController extends Controller
{
    public function index()
    {
        return view('pages.pindah-keluar');
    }
}
