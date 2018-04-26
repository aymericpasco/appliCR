<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function visit_reports() {
        return $this->hasMany(VisitReport::class, 'doctor_id', 'id');
    }
}
