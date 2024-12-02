<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'icon',
        'name',
        'path',
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

    public function subMenus(): HasMany
    {
        return $this->hasMany(SubMenu::class, 'menu_id'); 
    }
}
