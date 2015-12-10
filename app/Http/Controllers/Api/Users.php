<?php namespace HLS\Http\Controllers\Api;

use HLS\Http\Transformers\UserTransformer;
use HLS\User;
use Illuminate\Http\Request;

use HLS\Http\Requests;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Users extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return $this->collection($users, new UserTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'id' => $request['id'],
            'name' => $request['name'],
            'email' => $request['email'],
            'administrator' => true,
        ]);

        return $this->response->created();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        if (! $user) {
            throw new NotFoundHttpException();
        }

        return $this->item($user, new UserTransformer);
    }

    public function update(Request $request, $id)
    {
        User::findOrFail($id)->update([
            'id' => $request['id'],
            'name' => $request['name'],
            'email' => $request['email'],
        ]);

        return $this->response->created();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return $this->response->created();
    }
}
