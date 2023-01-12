<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataAbsenController extends Controller
{
    public function index(){
        return view ('admin.absensi.AbsensiManual')->with([
            'title' => 'Absensi Manual'
        ]);
    }
    public function izin(){
        return view ('admin.absensi.AlpaIzin')->with([
            'title' => 'Absensi Alpa/Izin'
        ]);
    }
    public function dataabsensi(){
        return view ('admin.rekap.DataAbsensi')->with([
            'title' => 'Data Absensi'
        ]);
    }
    
    public function datatelat(){
        return view ('admin.rekap.DataTelat')->with([
            'title' => 'Data Pegawai Telat'
        ]);
    }
    public function dataalpaizin(){
        return view ('admin.rekap.DataAlpaIzin')->with([
            'title' => 'Data Pegawai Alpa/Izin'
        ]);
    }
    
}
