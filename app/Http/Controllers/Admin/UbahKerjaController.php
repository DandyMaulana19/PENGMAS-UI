<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UbahKerjaController extends Controller
{
    public function rt()
    {
        $dataDummyTable = [
            [
                'nip' => '1234567890',
                'penulis' => 'John Doe',
                'judulpenelitian' => 'Laki laki',
                'kontributor' => 'Jane Doe',
                'prodi' => 'Agroteknologi',
                'tanggalupload' => '2021-01-01',
                'tanggalpembaruan' => '2021-01-02',

            ],
        ];
        return view('pages.admin.ubah-kerja', [
            'dataDummyTable' => $dataDummyTable
        ]);
    }
    public function rw()
    {
        $dataDummyTable = [
            [
                'nip' => '1234567890',
                'penulis' => 'John Doe',
                'judulpenelitian' => 'Laki laki',
                'kontributor' => 'Jane Doe',
                'prodi' => 'Agroteknologi',
                'tanggalupload' => '2021-01-01',
                'tanggalpembaruan' => '2021-01-02',

            ],
        ];
        return view('pages.admin.ubah-kerja', [
            'dataDummyTable' => $dataDummyTable
        ]);
    }
    public function kelurahan()
    {
        $dataDummyTable = [
            [
                'nip' => '1234567890',
                'penulis' => 'John Doe',
                'judulpenelitian' => 'Laki laki',
                'kontributor' => 'Jane Doe',
                'prodi' => 'Agroteknologi',
                'tanggalupload' => '2021-01-01',
                'tanggalpembaruan' => '2021-01-02',

            ],
        ];
        return view('pages.admin.ubah-kerja', [
            'dataDummyTable' => $dataDummyTable
        ]);
    }
    public function kecamatan()
    {
        $dataDummyTable = [
            [
                'nip' => '1234567890',
                'penulis' => 'John Doe',
                'judulpenelitian' => 'Laki laki',
                'kontributor' => 'Jane Doe',
                'prodi' => 'Agroteknologi',
                'tanggalupload' => '2021-01-01',
                'tanggalpembaruan' => '2021-01-02',

            ],
        ];
        return view('pages.admin.ubah-kerja', [
            'dataDummyTable' => $dataDummyTable
        ]);
    }
}
