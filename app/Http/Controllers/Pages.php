<?php

namespace HLS\Http\Controllers;

use Carbon\Carbon;
use HLS\Article;
use HLS\Category;
use HLS\Enquiry;
use HLS\MemberRequest;
use Illuminate\Http\Request;
use HLS\Http\Requests;
use HLS\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Pages extends Controller
{
    /**
     * Display index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $articles = Article::latest('published_at')->published()->get()->take(2);

        foreach ($articles as $article) {
            $article->date = $article->published_at->format('d-m-Y');
        }

        return view('pages.index', compact('articles'));
    }


    /**
     * Display About Us page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAboutUs()
    {
        return view('pages.about-us');
    }

    /**
     * Display News page
     *
     * @return \Illuminate\Http\Response
     */
    public function getNews()
    {
        $articles = Article::latest('published_at')->where('published_at', '<=', Carbon::Now())->get();

        foreach ($articles as $article) {
            $article->date = $article->published_at->format('d-m-Y');
        }

        return view('pages.news', compact('articles'));
    }

    /**
     * Display all articles in requested category
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCategory($category)
    {
        $articles = Category::latest()->where('name', $category)->first()->articles;

        return view('pages.category', compact('category', 'articles'));
    }

    /**
     * Display Become a Member page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBecomeAMember()
    {
        return view('pages.become-a-member');
    }

    /**
     * Save new Member from form.
     *
     * @return \Illuminate\Http\Response
     */
    public function postBecomeAMember(Request $request)
    {
        MemberRequest::create($request->all());

        return view('pages.thank-you')->withTitle('Become a Member');
    }

    /**
     * Show the form for creating a new Enquiry.
     *
     * @return \Illuminate\Http\Response
     */
    public function getContactUs()
    {
        return view('pages.contact-us');
    }

    /**
     * Store Enquiry and return POST route
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function postContactUs(Request $request)
    {
        Enquiry::create($request->all());

        return view('pages.thank-you')->withTitle('Contact Us');
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
