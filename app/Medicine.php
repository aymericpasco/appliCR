<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    /*public function visit_reports() {
        return $this->belongsToMany(VisitReport::class);
    }*/

    public function samples() {
        return $this->hasMany(Sample::class, 'medicine_id', 'id');
    }
}
