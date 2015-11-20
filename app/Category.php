<?php

namespace HLS;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $fillable = ['name', 'slug'];

    protected $dates = ['published_at'];

    protected $sluggable = [
        'build_from' => 'name',
        'save_to' => 'slug',
    ];

    /**
     * Get the articles associated with the given category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function publishedArticles()
    {
        return $this->belongsToMany(Article::class)->published();
    }

}
