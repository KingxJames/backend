<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'work_email',
        'phone_no',
        'organization',
        'device_token',
        'user_status_id',
        'role_id',
        'menu_id',
        'google_token',
        'picture'

    ];
    public $timestamps = false;


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',

    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    // Defined a relationship with Role that  states a user belongs a single role.
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Defined a relationship with UserCampus that a user is assign to only one campus.
    public function userCampus()
    {
        return $this->hasOne(UserCampus::class, 'user_id');
    }

    //Defined a relationship with the Device model that stats a user only have one device
    // public function device()
    // {
    //     return $this->hasOne(Device::class);
    // }

    //Define a relationship with the Message model for sent messages
    //that a user can send many messages
    // public function sentMessages()
    // {
    //     return $this->hasMany(Message::class, 'sender_id');
    // }

    // Define a relationship with the Message model for received messages 
    //and this states that a user can receive many messages
    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'recipient_id');
    }

    public function userStatus()
    {
        return $this->belongsTo(UserStatus::class, 'user_status_id');
    }
}