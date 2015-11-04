<?php

namespace HLS\Http\Controllers\Api;

use Carbon\Carbon;
use HLS\Article;
use HLS\Http\Transformers\ArticleTransformer;
use Illuminate\Http\Request;

use HLS\Http\Requests;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Articles extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest('published_at')->get();

        return $this->collection($articles, new ArticleTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Article::create([
            'title' => $request['title'],
            'brief' => $request['brief'],
            'extended' => $request['extended'],
            'image_url' => $request['image_url'],
            'archived' => (boolean) $request['archived'],
            'published_at' => Carbon::now()
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slugOrId)
    {
        $article = Article::findBySlugOrId($slugOrId);

        if (! $article) {
            throw new NotFoundHttpException();
        }

        return $this->item($article, new ArticleTransformer);
    }

    public function update(Request $request, $slugOrId)
    {
        $article = Article::findBySlugOrId($slugOrId);

        if (! $article) {
            throw new NotFoundHttpException();
        }

        $article->update([
            'title' => $request['title'],
            'brief' => $request['brief'],
            'extended' => $request['extended'],
            'image_url' => $request['image_url'],
            'archived' => $request['archived'],
            'published_at' => $request['published_at']
        ]);

        return response()->json(['message' => 'Article updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::findBySlugOrIdOrFail($id)->delete();
    }
}
