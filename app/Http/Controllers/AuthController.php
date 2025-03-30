<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $credentials = $request->only('username', 'password');

            if (Auth::attempt($credentials)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'redirect' => url('/')
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Login Gagal'
            ]);
        }

        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->ajax()) {
            return response()->json([
                'status' => true,
                'message' => 'Logout berhasil!'
            ]);
        }

        return redirect('login');
    }

    public function register()
    {
        $levels = LevelModel::select('level_id', 'level_nama')->get();
        return view('auth.register', compact('levels'));
    }

    public function postRegister(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:100',
                'username' => 'required|string|min:3|unique:m_user,username',
                'password' => 'required|min:6|confirmed',
                'level_id' => 'required|exists:m_level,level_id'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            $user = UserModel::create([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'level_id' => $request->level_id
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Registrasi berhasil! Silakan login.'
            ]);
        }

        return redirect('/register')->with('error', 'Terjadi kesalahan.');
    }
}
