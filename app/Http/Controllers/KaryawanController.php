<?php

namespace App\Http\Controllers;

use App\Models\MasterKaryawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
  public function index() 
  {
    $karyawan = MasterKaryawan::where('status', 'Aktif')->get();

    if (!$karyawan) {
      return response()->json([
        'status' => false,
        'message' => 'failed'
      ], 404);
    }

    return response()->json([
      'status' => true,
      'message' => 'success',
      'data' => $karyawan
    ], 200);
  }
}
