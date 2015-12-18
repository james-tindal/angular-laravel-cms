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
     * @param Request $memberRequest
     *
     * @return array
     */
    public function transform(MemberRequest $memberRequest)
    {
        return [
            'id' => $memberRequest['id'],
            'salutation' => $memberRequest['salutation'],
            'name' => $memberRequest['name'],
            'email' => $memberRequest['email'],
            'phone_number' => $memberRequest['phone_number'],
            'job_title' => $memberRequest['job_title'],
            'company_name' => $memberRequest['company_name'],
            'comment' => $memberRequest['comment'],
            'date' => $memberRequest['created_at']->format('jS F Y'),
        ];
    }

}