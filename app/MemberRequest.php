<?php

namespace HLS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberRequest extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable =[
        'salutation',
        'name',
        'email',
        'phone_number',
        'job_title',
        'company_name',
        'comment',
    ];
}
