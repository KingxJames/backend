<?php


// The menu_roles pivot table determines which roles have access to which menus.

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuRole extends Model
{
    use HasFactory;
    protected $fillable = [
        'menu_id',
        'role_id',
    ];
    public $timestamps = false;
}
