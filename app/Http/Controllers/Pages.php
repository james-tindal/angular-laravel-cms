<?php namespace HLS\Http\Controllers;

use Carbon\Carbon;
use HLS\Article;
use HLS\Category;
use HLS\Enquiry;
use HLS\MemberRequest;
use Illuminate\Database\Eloquent\Collection;
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
        $articles = $this->getPaginatedArticles()->take(2);

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
        $articles = Article::latest('published_at')->published()->paginate(5);

        foreach($articles as $article) {
            $article->date = $article->published_at->format('d-m-Y');
        }

        $categories = Category::all();

        return view('pages.news', compact('articles', 'categories'));
    }

    /**
     * Display News page
     *
     * @return \Illuminate\Http\Response
     */
    public function article($slug)
    {
        $article = Article::findBySlugOrFail($slug);
        $article->date = $article->published_at->format('d-m-Y');

        $related = $this->getRelatedArticles($article);

        if ($article->published_at >= Carbon::now()) {
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
        $articles = Category::findByNameOrFail($name)->articles->filter(function ($article) {
            return $article->published_at <= Carbon::now();
        })->each(function ($article) {
            // Add formatted date from published_at
            $article->date = $article->published_at->format('d-m-Y');
        });

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

    protected function getPaginatedArticles()
    {
        $articles = Article::latest('published_at')->published()->paginate(5)->each(function ($article) {
            $article->date = $article->published_at->format('d-m-Y');
        });

        return $articles;
    }

    protected function getRelatedArticles(Article $article)
    {
        // Get IDs of categories on this article
        $catIds = $article->categories->lists('id');

        $related = new Collection();
        foreach ($catIds as $id) {
            $related = $related->merge(Category::findOrFail($id)->articles);
        }

        $related = $related->filter(function($article) {
            return $article->published_at <= Carbon::now()
            && $article->archived == false;
        })->
        sortByDesc('published_at')->
        each(function($article) {
            $article->date = $article->published_at->format('jS F Y');
        });

        return $related;
    }
}
