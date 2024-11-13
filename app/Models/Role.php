<?php

//This Role models is to differnet the roles for the Admin portal and Anonymous app.
//Which are the Super Admins who have acess to everything and standard admin who view reports.
//The others are the Employees and students who will be using the anonymous app


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'roles',
        'description'
    ];
    public $timestamps = false;

    //Defined a relationship with User Model which states that a role can be associated with many users
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function accessRights()
    {
        return $this->hasMany(AccessRight::class);
    }

    public function menu()
    {
        return $this->hasOne(Menu::class);
    }

    public function menuRoles()
    {
        return $this->hasOne(MenuRole::class, 'role_id');
    }
}