<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approver extends Model
{
  public function dataRole() {
    return $this->belongsTo(MasterRole::class, 'role_id', 'id');
  }

  public function dataDetail() {
    return $this->hasMany(ApproverDetail::class, 'approver_id', 'id');
  }
}
