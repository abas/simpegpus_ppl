<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendText extends Model
{
    protected $table = 'send_texts';
    protected $fillable = [
        'text'
    ];
}
