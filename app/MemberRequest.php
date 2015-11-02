<?php

namespace HLS;

use Illuminate\Database\Eloquent\Model;

class MemberRequest extends Model
{
    protected $fillable =[
        'salutation',
        'other_salutation',
        'name',
        'email',
        'phone_number',
        'job_title',
        'company_name',
        'comment',
        'date',
    ];
}
