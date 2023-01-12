<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataAbsenController extends Controller
{
    public function index(){
        return view ('admin.absen.absensiManual')->with([
            'title' => 'Absensi Manual'
        ]);
    }
    public function izin(){
        return view ('admin.absen.alpaIzin')->with([
            'title' => 'Absensi alfa/izin'
        ]);
    }
    public function dataabsen(){
        return view ('admin.rekap.dataAbsensi')->with([
            'title' => 'Data Absensi'
        ]);
    }
    
    public function datatelat(){
        return view ('admin.rekap.dataTelat')->with([
            'title' => 'Data Pegawai Telat'
        ]);
    }
    public function dataalpaizin(){
        return view ('admin.rekap.dataAlpaIzin')->with([
            'title' => 'Data Pegawai Alpa/Izin'
        ]);
    }
    
}
