<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'path',
        'comment',
    ];
    public $timestamps = false;


    
    public function incidentReport()
    {
        return $this->belongsTo(IncidentReport::class, 'incident_file_id');
    }

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
