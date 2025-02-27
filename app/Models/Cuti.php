<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
  protected $table = "hc_cutis";

  public function dataKaryawan() {
    return $this->belongsTo(MasterKaryawan::class, 'master_karyawan_id', 'id');
  }
}
