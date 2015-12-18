<?php

namespace HLS\Http\Controllers\Api;

use HLS\Http\Transformers\MemberRequestTransformer;
use HLS\MemberRequest;
use Illuminate\Http\Request;

use HLS\Http\Requests;

class MemberRequests extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memberRequests = MemberRequest::latest('created_at')->get();

        $transformer = function ($memberRequest) {
            return [
                'id' => $memberRequest['id'],
                'salutation' => $memberRequest['salutation'],
                'name' => $memberRequest['name'],
                'job_title' => $memberRequest['job_title'],
                'company_name' => $memberRequest['company_name'],
                'date' => $memberRequest['created_at']->format('jS F Y'),
            ];
        };

        return [ 'data' => $memberRequests->map($transformer)->toArray() ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MemberRequest::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = MemberRequest::find($id);

        if (! $article) {
            throw new NotFoundHttpException();
        }

        return $this->item($article, new MemberRequestTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        MemberRequest::findOrFail($id)->delete();
    }
}
