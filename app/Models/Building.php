<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'building_location', 'campus_id'
    ];
    public $timestamps = false;
    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function incidentReport()
    {
        return $this->hasMany(IncidentReport::class);
    }
}
