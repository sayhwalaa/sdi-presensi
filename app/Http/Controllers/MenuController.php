<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cabang;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return view('index')->with([
            'title' => 'Sabang Digital Indonesia'
        ]);
    }
    public function pegawai()
    {
        $pegawai = User::where('role', 'Pegawai')->paginate(5);
        $jabatan = Jabatan::all();
        $cabang = Cabang::all();
        return view('admin.pegawai')->with([
            'title' => 'Data Pegawai',
            'pegawai' => $pegawai,
            'jabatan' => $jabatan,
            'cabang' => $cabang
        ]);
    }
}
