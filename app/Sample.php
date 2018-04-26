<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $fillable = [
        'quantity', 'medicine',
    ];

    public function visit_report() {
        return $this->belongsTo(VisitReport::class, 'visit_report_id', 'id');
    }

    public function medicine() {
        return $this->belongsTo(Medicine::class, 'medicine_id', 'id');
    }
}
