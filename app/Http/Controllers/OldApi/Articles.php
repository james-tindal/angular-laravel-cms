<?php

namespace HLS\Http\Controllers\api;

use HLS\Article;

use Illuminate\Http\Request;
use HLS\Http\Requests;

class Articles extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();

        return $this->respond([
            'data' => $this->transformCollection($articles)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Article::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slugOrId)
    {
        $article = Article::findBySlugOrId($slugOrId);

        if (!$article) {
            return $this->respondNotFound('Article does not exist');
        }

        return $this->respond([
            'data' => $this->transform($article->toArray())
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function transformCollection($articles)
    {
        return array_map([$this, 'transform'], $articles->toArray());
    }

    public function transform($article)
    {
        return [
            'title' => $article['title'],
            'brief' => $article['brief'],
            'extended' => $article['extended'],
            'image_url' => $article['image_url'],
            'archived' => (boolean) $article['archived'],
            'published_at' => $article['published_at'],
        ];
    }
}
