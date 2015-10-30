<?php

namespace HLS;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Event extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $fillable = [
        'title',
        'brief',
        'extended',
        'date',
        'image_url',
        'training',
        'archived'
    ];

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];


    protected $dates = ['date'];

}
