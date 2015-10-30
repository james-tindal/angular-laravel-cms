<?php

namespace HLS;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'brief',
        'extended',
        'date',
        'image_url',
        'training',
        'archived'
    ];

    protected $dates = ['date'];

}
