<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
     * Display News page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNews()
    {
        return view('news');
    }

    /**
     * Display Events and Training page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEventsAndTraining()
    {
        return view('events-and-training');
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
    public function postBecomeAMember()
    {
        return view('thank-you')->withTitle('Become a Member');
    }

    /**
     * Display Contact Us page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getContactUs()
    {
        return view('contact-us');
    }

    /**
     * Save Enquiry
     *
     * @return \Illuminate\Http\Response
     */
    public function postContactUs()
    {
        return view('contact-us-post');
    }


}
