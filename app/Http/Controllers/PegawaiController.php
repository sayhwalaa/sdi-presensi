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
        $user = User::where('role', 'Pegawai')->paginate(15);
        $jabatan = Jabatan::all();
        $cabang = Cabang::all();
        return view('admin.pegawai')->with([
            'title' => 'Data Pegawai',
            'users' => $user,
            'jabatans' => $jabatan,
            'cabangs' => $cabang
        ]);
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
            'name' => 'required|min:3',
            'rarity' => 'required|in:4,5',
            'weapon' => 'required|in:"sword","claymore","polearm","catalyst","bow"',
            'vision' => 'required|in:"pyro","hydro","electro","cryo","dendro","anemo","geo"',
            'birthday' => 'required|date',
            'constellation' => 'required|min:3',
            'region' => 'required|min:3'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $data = [
                'name' => ucwords(trim($request->name)),
                'rarity' => $request->rarity,
                'weapon' => $request->weapon,
                'vision' => $request->vision,
                'Birthday' => $request->birthday,
                'constellation' => ucwords(trim($request->constellation)),
                'region' => ucwords(trim($request->region))
            ];
            Char::create($data);
            return response()->json([
                'status' => 200,
                'message' => 'New Character successfully added',
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
