<?php

namespace HLS;

use Illuminate\Database\Eloquent\Model;

class MemberRequest extends Model
{
    protected $fillable =[
        'salutation',
        'other-salutation',
        'name',
        'email',
        'phone-number',
        'job-title',
        'company-name',
        'comment',
        'date',
    ];
}
