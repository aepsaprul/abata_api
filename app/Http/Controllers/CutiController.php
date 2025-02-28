<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;

class CutiController extends Controller
{
  public function show($id)
  {
    // $cuti = Cuti::find($id);

    // return response()->json([
    //   'message' => 'Success',
    //   'cuti' => $cuti
    // ], 200);

    // Ambil data cuti berdasarkan ID dengan user yang sedang login
    $cuti = Cuti::find($id);

    // Jika data tidak ditemukan, kembalikan response 404
    if (!$cuti) {
    return response()->json([
      'success' => false,
      'message' => 'Data cuti tidak ditemukan'
    ], 404);
    }

    return response()->json([
      'success' => true,
      'message' => 'Detail cuti berhasil diambil',
      'data' => $cuti
    ], 200);
  }
}
