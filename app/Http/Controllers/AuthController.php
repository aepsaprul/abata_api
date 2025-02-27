<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\MasterKaryawan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
  // Register
  public function register(Request $request)
  {
      $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|unique:users',
          'password' => 'required|string|min:6'
      ]);

      $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
      ]);

      $token = $user->createToken('auth_token')->plainTextToken;

      return response()->json(['token' => $token, 'user' => $user]);
  }

  // Login
  public function login(Request $request)
  {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $karyawan = MasterKaryawan::with(['dataCabang', 'dataJabatan', 'dataKontrak'])->find($user->master_karyawan_id);
        $cuti = Cuti::where('master_karyawan_id', $karyawan->id)->orderBy('created_at', 'desc')->limit(10)->get();
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'user' => $user,
            'karyawan' => $karyawan,
            'cuti' => $cuti,
            'token' => $token
        ], 200);
    }

    return response()->json([
        'success' => false,
        'message' => 'Email atau password salah'
    ], 401);
  }

  // Logout
  public function logout(Request $request)
  {
      $request->user()->tokens()->delete();
      return response()->json(['message' => 'Logged out successfully']);
  }

  // Get Profile
  public function profile(Request $request)
  {
      return response()->json($request->user());
  }
}
