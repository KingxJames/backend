<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'report',
        'disposition',
        'case_number',
        'action',
        'location',
        'uploaded_by',
        'incident_reoccured',
        'frequency',
        'incident_file_id',
        'incident_status_id',
        'user_id',
        'campus_id',
        'building_id',
        'incident_type_id'
    ];
    public $timestamps = false;



    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function incidentStatus()
    {
        return $this->belongsTo(IncidentStatus::class);
    }

    public function incidentType()
    {
        return $this->belongsTo(IncidentType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function incidentFile()
    {
        return $this->hasOne(IncidentFile::class, 'incident_file_id');
    }
}