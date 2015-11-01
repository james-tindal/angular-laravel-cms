<?php namespace HLS\Http\Transformers;

use Dingo\Api\Http\Request;
use Dingo\Api\Transformer\Binding;
use HLS\MemberRequest;
use League\Fractal\TransformerAbstract;

class MemberRequestTransformer extends TransformerAbstract
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
    public function transform(MemberRequest $request)
    {
        return [
            'id' => $request['id'],
            'salutation' => $request['salutation'],
            'name' => $request['name'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'],
            'job_title' => $request['job_title'],
            'company_name' => $request['company_name'],
            'comment' => $request['comment'],
            'date' => $request['date'],
            'archived' => (boolean) $request['archived'],
        ];
    }

}