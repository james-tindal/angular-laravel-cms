<?php

namespace HLS;

use Carbon\Carbon;
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
        'save_to' => 'slug',
    ];

    protected $dates = ['date'];

    public function getDateAttribute($date)
    {
        return Carbon::parse($date)->format('d-m-Y');
    }

    public static function index()
    {
        return static::latest('date')
            ->where('training', false)->paginate(4);
    }

    public static function training()
    {
        return static::latest('date')
            ->where('date', '>=', Carbon::Now())
            ->where('training', true)->paginate(4);
    }

    public static function events()
    {
        return static::latest('date')
            ->where('date', '>=', Carbon::Now())
            ->where('training', false)->paginate(4);
    }

    public static function past()
    {
        return static::latest('date')
            ->where('date', '<=', Carbon::Now())
            ->where('training', false)->paginate(4);
    }
}
