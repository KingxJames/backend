<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentMember extends Model
{
    use HasFactory;
    protected $fillable = [
       'department_id',
       'user_id'
    ];
    public $timestamps = false;
}
