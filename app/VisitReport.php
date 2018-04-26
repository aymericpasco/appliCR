<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitReport extends Model
{

    protected $fillable = [
        'report_date', 'reason', 'revue',
    ];

    public function visitor() {
        return $this->belongsTo(User::class, 'visitor_id', 'id');
    }

    public function doctor() {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    public function samples() {
        return $this->hasMany(Sample::class, 'visit_report_id', 'id');
    }

    /*public function medicines() {
        return $this->belongsToMany(Medicine::class, 'medicine_visit_report',
            'visit_report_id', 'medicine_id');
    }*/
}
