<?php

namespace App\Models\Zonber;

use Illuminate\Database\Eloquent\Model;

class Chatting extends Model
{
    protected $connection = 'zonber';
    
    protected $fillable = [
        'room_id',
        'user_id',
        'user_name',
        'message',
    ];
}
