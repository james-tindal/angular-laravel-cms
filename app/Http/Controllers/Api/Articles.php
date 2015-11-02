<?php

namespace HLS\Http\Controllers\Api;

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
        $articles = Article::all();

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
        Article::create($request->all());
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

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
