<?php

namespace HLS\Http\Controllers;

use HLS\MemberRequest;
use Illuminate\Http\Request;
use HLS\Http\Requests;
use HLS\Http\Controllers\Controller;

class Pages extends Controller
{
    /**
     * Display index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('index');
    }


    /**
     * Display About Us page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAboutUs()
    {
        return view('about-us');
    }

    /**
     * Display Become a Member page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBecomeAMember()
    {
        return view('become-a-member');
    }

    /**
     * Save new Member from form.
     *
     * @return \Illuminate\Http\Response
     */
    public function postBecomeAMember(Request $request)
    {
        MemberRequest::create($request->all());

        return view('thank-you')->withTitle('Become a Member');
    }

    /**
     * Show Angular admin app or log-in form
     *
     * @return \Illuminate\View\View
     */
    public function getAdmin()
    {
        return view('admin.index');
    }

}
