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
}
