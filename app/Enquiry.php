<?php

namespace HLS;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'job-title',
        'phone-number',
        'comment',
    ];
    
}