<?php

namespace App\Models;

// It is important for each  account user to have a  primary campus  
// linked. User accounts  should not be created  if there are no main  campuses linked to the  account.  

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'campus', 
        // 'location'
    ];
    public $timestamps = false;


    public function users()
    {
        return $this->belongsToMany(User::class, 'user_campus', 'campus_id', 'user_id');
    }

    public function userCampus()
    {
        return $this->hasOne(UserCampus::class, 'campus_id');
    }

    public function building()
    {
        return $this->hasMany(Building::class, 'campus_id');
    }

    public function incidentReports()
    {
        return $this->hasMany(IncidentReport::class);
    }
}
