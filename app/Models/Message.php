<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'message_category_id',
        'sender_id',
        'topic',
        'message',
        'location',
        'date_sent',
        'is_archive',
        'is_deleted',
        'is_forwarded',
        'type',
    ];
    public $timestamps = false;


    // public function sender()
    // {
    //     return $this->belongsTo(User::class, 'sender_id');
    // }

    public function incidentFile()
    {
        return $this->hasOne(IncidentFile::class, 'message_id');
    }

    public function messageCategory()
    {
        return $this->belongsTo(MessageCategory::class , 'messageCategory_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'message_id');
    }

    public function recipients()
    {
        return $this->belongsToMany(User::class, 'recipient', 'message_id', 'user_id');
    }
}
