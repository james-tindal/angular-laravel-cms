<?php

namespace HLS\Http\Controllers;

use Illuminate\Http\Request;
use HLS\Http\Requests;
use HLS\Http\Controllers\Controller;

class MemberArea extends Controller
{
    /**
     * Display index page
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        // if logged in
        // return view('members.index');

        // else
        return view('members.log-in');

    }

}
