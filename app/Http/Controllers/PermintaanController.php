<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermintaanController extends Controller
{

    public function index()
    {
        $dataDummyTable = [
            [
                'nip' => '1234567890',
                'penulis' => 'John Doe',
                'judulpenelitian' => 'Pengaruh Pupuk Kandang Terhadap Pertumbuhan Tanaman',
                'kontributor' => 'Jane Doe',
                'prodi' => 'Agroteknologi',
                'tanggalupload' => '2021-01-01',
                'tanggalpembaruan' => '2021-01-02',

            ],
            [
                'nip' => '1234567890',
                'penulis' => 'John Doe',
                'judulpenelitian' => 'Pengaruh Pupuk Kandang Terhadap Pertumbuhan Tanaman',
                'kontributor' => 'Jane Doe',
                'prodi' => 'Agroteknologi',
                'tanggalupload' => '2021-01-01',
                'tanggalpembaruan' => '2021-01-02',

            ],
            [
                'nip' => '1234567890',
                'penulis' => 'John Doe',
                'judulpenelitian' => 'Pengaruh Pupuk Kandang Terhadap Pertumbuhan Tanaman',
                'kontributor' => 'Jane Doe',
                'prodi' => 'Agroteknologi',
                'tanggalupload' => '2021-01-01',
                'tanggalpembaruan' => '2021-01-02',

            ],
            [
                'nip' => '1234567890',
                'penulis' => 'John Doe',
                'judulpenelitian' => 'Pengaruh Pupuk Kandang Terhadap Pertumbuhan Tanaman',
                'kontributor' => 'Jane Doe',
                'prodi' => 'Agroteknologi',
                'tanggalupload' => '2021-01-01',
                'tanggalpembaruan' => '2021-01-02',
            ],
        ];
        return view('pages.permintaan', [
            'dataDummyTable' => $dataDummyTable
        ]);
    }
}
