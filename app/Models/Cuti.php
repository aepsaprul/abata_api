<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
  protected $table = "hc_cutis";

  public function dataKaryawan() {
    return $this->belongsTo(MasterKaryawan::class, 'master_karyawan_id', 'id');
  }

  public function dataPengganti() {
    return $this->belongsTo(MasterKaryawan::class, "karyawan_pengganti", "id");
  }

  public function dataTanggal() {
    return $this->hasMany(CutiTanggal::class, 'hc_cuti_id', 'id');
  }

  public function dataApprover() {
    return $this->hasMany(CutiApprover::class, 'cuti_id', 'id');
  }
}