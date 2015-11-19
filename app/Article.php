<?php

namespace HLS;

use Carbon\Carbon;
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

    public function related()
    {
        // Get IDs of categories on this article
        $related = $this->categories->lists('id');

        foreach ($related as $i => $id) {
            $related[$i] = Category::findOrFail($id)->articles;
        }

        $related = $related->collapse()
            ->filter(function ($article) {
                return Carbon::parse($article->published_at) <= Carbon::now()
                && $article->archived == false;
            })
            ->sortByDesc('published_at')
            ->each(function ($article) {
                $article->published_at_formatted = Carbon::parse($article->published_at)->format('jS F Y');
            });
        $related = $related->unique();

//        dd($related);
        return $related;
    }

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now())->where('archived', false);
    }

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function getPublishedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d-m-Y');
    }

    public static function index()
    {
        return static::latest('published_at')->published()->paginate(5);
    }
}
