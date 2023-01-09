<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index()
    {
        return view('auth.index')->with([
            'title' => 'Login'
        ]);
    }
    public function create(Request $request)
    {
        return view('auth.daftar')->with([
            'title' => 'Daftar'
        ]);
    }
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'nama' => 'required|min:3|max:50',
            'nip' => 'required|numeric|unique:App\Models\Pegawai,nip',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);
        $user = User::latest()->first();
        $pegawai = new Pegawai;
        $pegawai->nama = $validateData['nama'];
        $pegawai->nip = $validateData['nip'];
        $user->pegawai()->save($pegawai);

        $request->session()->flash('success', "Sign Up Success! Please Login");
        return redirect()->route('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = User::find(Auth::user()->id);
            return redirect()->intended(route('menu.home'))->with('success', 'Selamat datang kembali ' . $user->pegawai->nama);
        }
        return back()->with('error', 'Email atau Password Salah')->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect(route('login'));
    }
}
