<?php

namespace HLS\Http\Controllers;

use Carbon\Carbon;
use HLS\Article;
use HLS\Event;
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
     * Display News page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNews()
    {
//        $articles = Article::latest('published_at')->where('published_at', '<=', Carbon::Now())->get();

        return view('news', compact('articles'));
    }

    /**
     * Display Events and Training page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEventsAndTraining()
    {
//        $events = Event::latest('published_at')->where('published_at', '<=', Carbon::Now())->get();
        // Query may need to be a little more complicated than this.

        return view('events-and-training', compact('events'));
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
     * Show Angular admin app or log-in form
     *
     * @return \Illuminate\View\View
     */
    public function getAdmin()
    {
        return view('admin.index');
    }

}
