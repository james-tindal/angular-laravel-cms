<?php

namespace HLS;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    protected $dates = ['published_at'];

    /**
     * Get the articles associated with the given category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public static function findByNameOrFail($name)
    {
        return self::whereName($name)->firstOrFail();
    }
}
