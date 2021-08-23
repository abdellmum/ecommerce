<?php

namespace App\model\frontend;

use Illuminate\Database\Eloquent\Model;

class Contact_Message extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
    ];
}
