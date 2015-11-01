<?php namespace HLS\Http\Transformers;

use Dingo\Api\Http\Request;
use Dingo\Api\Transformer\Binding;
use HLS\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
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
    public function transform(User $user)
    {
        return [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'administrator' => (boolean) $user['administrator'],
        ];
    }
}