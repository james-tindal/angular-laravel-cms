<?php namespace HLS\Http\Transformers;

use Dingo\Api\Http\Request;
use Dingo\Api\Transformer\Binding;
use HLS\Article;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{

    /**
     * Transform a response with a transformer.
     *
     * @param mixed $response
     * @param object $transformer
     * @param Binding $binding
     * @param Request $request
     *
     * @return array
     */
    public function transform(Article $article)
    {
        return [
            'id' => $article['id'],
            'title' => $article['title'],
            'brief' => $article['brief'],
            'extended' => $article['extended'],
            'image_url' => $article['image_url'],
            'archived' => (boolean) $article['archived'],
            'published_at' => $article['published_at']->format('d-m-Y H:i:s')
        ];
    }
}