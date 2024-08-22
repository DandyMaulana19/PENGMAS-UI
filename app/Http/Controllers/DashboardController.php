<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index($id)
    {
        // $user = User::findOrFail($id);
        $user = User::with('dataDiris.statusPengajuan')->findOrFail($id);

        if (auth()->check() && auth()->user()->id != $id) {
            return redirect('/warga/dashboard/' . auth()->user()->id)->withErrors('Unauthorized access.');
        }

        $dataDiri = $user->dataDiris->first();

        // Ambil status pengajuan dari data diri
        $currentStatus = $dataDiri->statusPengajuan->nama_status ?? null;
        // $statusPengajuans = $user->datadiris()->with('statuspengajuan')->get()->pluck('statuspengajuan.nama_status');


        // dd($currentStatus, $dataDiri);
        return view('pages.dashboard', compact('user', 'dataDiri', 'currentStatus'));
    }
}
