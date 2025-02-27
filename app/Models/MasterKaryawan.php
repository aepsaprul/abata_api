<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterKaryawan extends Model
{
  public function dataCabang() {
    return $this->belongsTo(MasterCabang::class, 'master_cabang_id', 'id');
  }

  public function dataJabatan() {
    return $this->belongsTo(MasterJabatan::class, 'master_jabatan_id', 'id');
  }

  public function dataKontrak() {
    return $this->hasMany(Kontrak::class, 'karyawan_id', 'id');
  }
}
