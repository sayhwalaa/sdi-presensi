<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return response()->json(User::where('role', 'Admin')->with('pegawai')->get());
    }
    public function store(Request $request)
    {
        $validator = Validator::Make($request->all(), [
            'nama' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $data = [
                'nama' => ucwords(trim($request->nama)),
                'email' => strtolower($request->email),
                'role' => 'Admin',
                'password' => Hash::make($request->password),
            ];

            User::create($data);

            return response()->json([
                'status' => 200,
                'message' => 'New Admin successfully added',
            ]);
        }
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }
    public function update(Request $request, $id)
    {
        if ($request->idReset != '') {
            $validator = Validator::Make($request->all(), [
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'errors' => $validator->messages()
                ]);
            } else {
                User::where('id', $request->idReset)->update([
                    'password' => Hash::make($request->password),
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => 'Password successfully updated',
                ]);
            }
        }
        $validator = Validator::Make($request->all(), [
            'nama' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,id',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            User::where('id', $id)->update([
                'nama' => ucwords(trim($request->nama)),
                'email' => strtolower($request->email),
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Admin successfully updated',
            ]);
        }
    }
    public function destroy($id)
    {
        if (!User::destroy($id)) {
            return response()->json([
                'status' => 400,
                'errors' => 'Failed Deleted'
            ]);
        }
        return response()->json([
            'status' => 200,
            'message' => 'Admin successfully deleted',
        ]);
    }
}
