<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
