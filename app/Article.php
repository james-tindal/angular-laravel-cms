<?php

namespace HLS;

use Carbon\Carbon;
use HLS\Helpers\Help;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Support\Collection;

class Article extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $fillable = [
        'title',
        'brief',
        'extended',
        'image_url',
        'archived',
        'published_at',
    ];

    protected $sluggable = [
        'build_from' => 'title',
        'save_to' => 'slug',
    ];

    protected $dates = ['published_at'];

    /**
     * Get the categories associated with the given article
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Get articles that share a category
     *
     * @return Collection|static
     */
    public function related()
    {
        return $this->categories->lists('id')
            ->map(function ($id) {
                return Category::findOrFail($id)->publishedArticles;
            })
            ->collapse()
            ->unique()
            ->sortByDesc('published_at');
    }

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now())->where('archived', false);
    }

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    public static function index()
    {
        return static::latest('published_at')->published()->paginate(5);
    }

    /**
     * Find a model by slug or fail.
     *
     * @param $slug
     * @return Model
     */
    public static function findPublishedBySlugOrFail($slug)
    {
        return self::whereSlug($slug)->published()->firstOrFail();
    }
}
