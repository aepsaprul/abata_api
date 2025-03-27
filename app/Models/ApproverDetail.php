<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApproverDetail extends Model
{
  public function dataKaryawan() {
    return $this->belongsTo(MasterKaryawan::class, 'karyawan_id', 'id');
  }
}
