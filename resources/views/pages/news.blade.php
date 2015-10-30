@extends('layouts.main')
@section('title', 'Hertfordshire Law Society - News')
@section('main')

    <h1>Latest News</h1>

    <div class="latest-news">
        @foreach($articles as $article)
            <section>
                <aside>
                    @unless (is_null($article->image_url))
                        <img src="{{ $article->image_url }}" alt="">
                    @endunless
                </aside>
                <header>
                    <h4>{{ $article->title }}</h4>
                    <p><span>{{ $article->date }}</span><a href="category/a-category">A category</a></p>
                </header>
                <p>{{ $article->brief }} <a href="single/a-news-item">Read More</a></p>
            </section>
        @endforeach

        <section>
            <aside></aside>
            <header>
                <h4>A news item</h4>
                <p><span>xx/xx/xx</span><a href="category/">A category</a></p>
            </header>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Repellendus nulla iure totam, cum labore culpa quisquam libero natus quae voluptate. Et rerum officia nihil reprehenderit dolorem quidem doloribus, dolorum assumenda. <a href="single/a-news-item">Read More</a></p>
        </section>

        <section>
            <header>
                <h4>A news item</h4>
                <p><span>xx/xx/xx</span><a href="category/">A category</a></p>
            </header>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Repellendus nulla iure totam, cum labore culpa quisquam libero natus quae voluptate. Et rerum officia nihil reprehenderit dolorem quidem doloribus, dolorum assumenda. <a href="single/a-news-item">Read More</a></p>
        </section>

        <section>
            <aside><img src="http://lorempixel.com/212/61/business" alt="placeholder"></aside>
            <header>
                <h4>A news item</h4>
                <p><span>xx/xx/xx</span><a href="category/">A category</a></p>
            </header>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Repellendus nulla iure totam, cum labore culpa quisquam libero natus quae voluptate. Et rerum officia nihil reprehenderit dolorem quidem doloribus, dolorum assumenda. <a href="single/a-news-item">Read More</a></p>
        </section>

        <section>
            <aside><img src="http://lorempixel.com/212/161/business" alt="placeholder"></aside>
            <header>
                <h4>A news item</h4>
                <p><span>xx/xx/xx</span><a href="category/">A category</a></p>
            </header>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Repellendus nulla iure totam, cum labore culpa quisquam libero natus quae voluptate. Et rerum officia nihil reprehenderit dolorem quidem doloribus, dolorum assumenda. <a href="single/a-news-item">Read More</a></p>
        </section>

        <section>
            <header>
                <h4>A news item</h4>
                <p><span>xx/xx/xx</span><a href="category/">A category</a></p>
            </header>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Repellendus nulla iure totam, cum labore culpa quisquam libero natus quae voluptate. Et rerum officia nihil reprehenderit dolorem quidem doloribus, dolorum assumenda. <a href="single/a-news-item">Read More</a></p>
        </section>
    </div>

    <nav class="news-categories">
        <ul>
            <li><a href="category/a-category">A Category Name</a></li>
            <li><a href="category/a-category">A Category Name</a></li>
            <li><a href="category/a-category">A Category Name</a></li>
            <li><a href="category/a-category">A Category Name</a></li>
        </ul>
    </nav>
@endsection
