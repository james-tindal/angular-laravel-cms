<?php namespace HLS\Http\Controllers;

use Carbon\Carbon;
use HLS\Article;
use HLS\Category;
use HLS\Enquiry;
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
    public function index()
    {
        $articles = Article::index()->take(2);

        return view('pages.index', compact('articles'));
    }


    /**
     * Display About Us page.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutUs()
    {
        return view('pages.about-us');
    }

    /**
     * Display News page
     *
     * @return \Illuminate\Http\Response
     */
    public function news()
    {
        $articles = Article::index();

        $categories = Category::all();

        return view('pages.news', compact('articles', 'categories'));
    }

    /**
     * Display News page
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function article($slug)
    {
        $article = Article::findBySlugOrFail($slug);

        $related = $article->related();

        if ($article->published_at > Carbon::now()) {
            abort(404);
        }

        return view('pages.article', compact('article', 'related'));
    }

    /**
     * Display all articles in requested category
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function category($name)
    {
        $articles = Category::publishedArticles($name);

        $categories = Category::all();

        return view('pages.category', compact('name', 'articles', 'categories'));
    }

    /**
     * Display Become a Member page.
     *
     * @return \Illuminate\Http\Response
     */
    public function becomeAMember()
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
    public function contactUs()
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
    public function admin()
    {
        return view('pages.admin');
    }

}
