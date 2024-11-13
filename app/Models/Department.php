<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
       'name',
       'message_id',
    ];
    public $timestamps = false;


    public function members()
    {
        return $this->hasOne(DepartmentMember::class, 'department_id');
    }
}
