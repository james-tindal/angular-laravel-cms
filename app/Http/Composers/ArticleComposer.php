<?php

namespace HLS\Http\Composers;

use HLS\Article;
use Illuminate\Contracts\View\View;

class ArticleComposer
{

    /**
     * Create a new profile composer.
     *
     */
    public function __construct()
    {

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $a = $view->article;
        
        $view->with([
            'title' => $a->title,
            'image' => $this->composeImage($a),
            'categories' => $this->composeCategories($a),
            'withCategories' => $this->composeSpan($a),
            'content' => $a->extended,
            'brief' => $a->brief,
            'slug' => $a->slug,
            'published_at' => $a->published_at,

        ]);


    }

    /**
     * Bind image to the view if it exists.
     *
     * @param Article $a
     * @return string
     */
    private function composeImage(Article $a)
    {
        $image = $a->image_url;

        return $image ? "<img src=\"$image\" alt=\"\">" : '';
    }

    /**
     * Compose open span tag for article header.
     *
     * @param Article $a
     * @return string
     */
    private function composeSpan(Article $a)
    {
        return $a->categories->isEmpty() ? '' : 'class="with-categories"';

    }

    /**
     * Compose list of category links.
     *
     * @param Article $a
     * @return string
     */
    private function composeCategories(Article $a)
    {
        return $a->categories
            ->lists('name')
            ->map(function ($category) {
                return sprintf('<a href="%s">%s</a>', url('category/' . $category), $category);
            })
            ->implode(', ');

    }
}