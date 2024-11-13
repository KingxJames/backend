<?php

// The administrator creating an account with admin privileges must assign a campus to that administrator.  
// The campuses are the Belize City Campus, Belmopan Campus, Central Farm Campus and Punta Gorda Campus. 
//For administrators, each campus would be assigned to one administrator


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCampus extends Model
{
    use HasFactory;
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'user_id',
       'campus_id',
       'primary_campus',
   ];
   public $timestamps = false;


    // Define a relationship with the User model and a userCampus belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define a relationship with the Campus model and a usercampus belongs to a camps
    public function campus()
    {
        return $this->belongsTo(Campus::class, 'campus_id');
    }
}
