<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageReply extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message_id', 'content'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
