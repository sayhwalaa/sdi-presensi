<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cabang;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return response()->json(User::where('role', 'Pegawai')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::Make($request->all(), [
            'nip' => 'required|numeric|size:18',
            'nama' => 'required|min:3',
            'jabatan_id' => 'required',
            'jenis_kelamin' => 'required',
            'no_telepon' => 'numeric',
            'jabatan_id' => 'required',
            'cabang_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            User::create([
                'role' => 'Pegawai'
            ]);
            $data = [
                'user_id' => User::latest()->first()->id,
                'nip' => trim($request->nip),
                'nama' => ucwords(trim($request->nama)),
                'tgl_lahir' => $request->tgl_lahir,
                'j_kelamin' => $request->j_kelamin,
                'no_telepon' => $request->no_telepon,
                'alamat' => $request->alamat,
                'jabatan_id' => $request->jabatan_id,
                'cabang_id' => $request->cabang_id,
            ];
            Pegawai::create($data);
            return response()->json([
                'status' => 200,
                'message' => 'New Pegwai successfully added',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        //
    }
}
