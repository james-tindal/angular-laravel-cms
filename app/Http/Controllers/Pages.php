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

        $categoryList = Category::all()->lists('name');

        return view('pages.news', compact('articles', 'categoryList'));
    }

    /**
     * Display News page
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function article($slug)
    {
        $article = Article::findPublishedBySlugOrFail($slug);

        $related = $article->related();

        return view('pages.article', compact('article', 'related'));
    }

    /**
     * Display all articles in requested category
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function category($slug)
    {
        $name = Category::findBySlugOrFail($slug)->name;

        $articles = Category::findBySlug($slug)->publishedArticles;

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
        MemberRequest::create([
            'salutation' => $request['salutation']
                ?: $request['other-salutation'],
            'name' => $request['name'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'],
            'job_title' => $request['job_title'],
            'company_name' => $request['company_name'],
            'comment' => $request['comment'],
        ]);

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
