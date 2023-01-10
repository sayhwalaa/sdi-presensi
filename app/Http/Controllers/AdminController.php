<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cabang;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
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
    public function user()
    {
        $user = User::paginate(5);
        return view('admin.user')->with([
            'title' => 'Data User',
            'user' => $user,
        ]);
    }
}
