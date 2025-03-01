<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CutiApprover extends Model
{
  protected $table = "cuti_details";

  public function dataCuti() {
    return $this->belongsTo(Cuti::class, 'cuti_id', 'id');
  }

  public function dataAtasan() {
    return $this->belongsTo(MasterKaryawan::class, 'atasan_id', 'id');
  }
}
