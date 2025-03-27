<?php

namespace App\Http\Controllers;

use App\Models\Approver;
use App\Models\Cuti;
use App\Models\CutiApprover;
use App\Models\CutiTanggal;
use App\Models\MasterKaryawan;
use App\Models\MasterRole;
use Illuminate\Http\Request;

class CutiController extends Controller
{
  public function show($id)
  {
    $cuti = Cuti::with(['dataKaryawan', 'dataPengganti', 'dataTanggal', 'dataApprover'])->find($id);

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

  public function store(Request $request)
  {
    // $cuti = new Cuti;
    // $cuti->master_karyawan_id = $request->master_karyawan_id;
    // $cuti->telepon = $request->telepon;
    // $cuti->jenis = $request->jenis;
    // $cuti->jml_hari = $request->jml_hari;
    // $cuti->karyawan_pengganti = $request->karyawan_pengganti;
    // $cuti->alasan = $request->alasan;
    // $cuti->status_approve = 'pending';
    // $cuti->save();

    // foreach ($request->cuti_tanggal as $key => $value) {
    //   $cuti_tgl = new CutiTanggal;
    //   $cuti_tgl->hc_cuti_id = $cuti->id;
    //   $cuti_tgl->tanggal = $value;
    //   $cuti_tgl->save();
    // }

    // $karyawan = MasterKaryawan::find($request->master_karyawan_id);
    // $role = MasterRole::where('nama', $karyawan->role)->first();
    // $approver = Approver::where('jenis', 'cuti')->where('role_id', $role->id)->first();

    // foreach ($approver->dataDetail as $key => $value) {
    //   $cuti_detail = new CutiApprover;
    //   $cuti_detail->hirarki = $value->hirarki;
    //   $cuti_detail->approver_id = $approver->id;
    //   $cuti_detail->jenis = $approver->jenis;
    //   $cuti_detail->role = $role->nama;
    //   $cuti_detail->cuti_id = $cuti->id;
    //   $cuti_detail->atasan_id = $value->karyawan_id;
    //   $cuti_detail->atasan_nama = $value->dataKaryawan->nama_panggilan;
    //   $cuti_detail->save();
    // }

    // if (!$cuti) {
    //   return response()->json([
    //     'success' => false,
    //     'message' => 'Data cuti tidak ditemukan'
    //   ], 404);
    // }

    // return response()->json([
    //   'success' => true,
    //   'message' => 'Detail cuti berhasil diambil',
    //   'data' => $cuti
    // ], 200);

    // return response()->json([
    //   'success' => true,
    //   'message' => 'success',
    //   'data' => $request->all()
    // ], 200);

    return response()->json(['message' => 'Cuti berhasil diajukan!', 'data' => $request->all()], 201);
  }
}
