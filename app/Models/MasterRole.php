<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterRole extends Model
{
  public function dataApprover() {
    return $this->hasMany(Approver::class, 'role_id', 'id');
  }
}
