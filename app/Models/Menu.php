<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'icon',
        'name',
        'path',
        'parent_id',
        'role_id',
    ];
    public $timestamps = false;


    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function menuRoles()
    {
        return $this->hasOne(MenuRole::class, 'menu_id');
    }
}
