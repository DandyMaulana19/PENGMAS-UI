<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Aktifitas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index($id)
    {
        $user = User::with('dataDiris.statusPengajuan')->findOrFail($id);
        $aktifitas = Aktifitas::where('user_id', $user->id)->get();

        if (auth()->check() && auth()->user()->id != $id) {
            return redirect('/warga/dashboard/' . auth()->user()->id)->withErrors('Unauthorized access.');
        }

        $dataDiri = $user->dataDiris->first();
        $currentStatus = $dataDiri->statusPengajuan->nama_status ?? null;

        return view('pages.dashboard', compact('user', 'dataDiri', 'currentStatus', 'aktifitas'));
    }
}
