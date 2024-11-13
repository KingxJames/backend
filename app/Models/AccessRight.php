<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessRight extends Model
{
    use HasFactory;
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'description',
       'role_id',
   ];

   public $timestamps = false;


   public function role()
   {
       return $this->belongsTo(Role::class);
   }
}
