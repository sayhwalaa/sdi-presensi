<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cabang;
use App\Models\Jabatan;

class MenuAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function pegawai()
    {
        $pegawai = User::where('role', 'Pegawai')->with('pegawai')->paginate(5);
        $jabatan = Jabatan::all();
        $cabang = Cabang::all();
        return view('admin.pegawai')->with([
            'title' => 'Data Pegawai',
            'pegawai' => $pegawai,
            'jabatan' => $jabatan,
            'cabang' => $cabang
        ]);
    }
    public function admin()
    {
        $admin = User::where('role', 'Admin')->paginate(5);
        return view('admin.admin')->with([
            'title' => 'Data User',
            'admin' => $admin,
        ]);
    }
}
