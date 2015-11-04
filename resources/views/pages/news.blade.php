@extends('layouts.main')
@section('title', 'Hertfordshire Law Society - News')
@section('main')

    <h1>Latest News</h1>

    <div class="latest-news">
        @foreach($articles as $article)
            <section>
                @unless (is_null($article->image_url))
                    <aside>
                        <img src="{{ $article->image_url }}" alt="">
                    </aside>
                @endunless
                <header>
                    <h4>{{ $article->title }}</h4>

                    <p>
                        <span @if(sizeof($article->categories) > 0)class="with-categories"@endif>{{ $article->date }}</span>
                        @foreach($article->categories as $category)
                            <a href="{{ url('category') }}/{{ $category->name }}">{{ $category->name }}</a>,
                        @endforeach
                    </p>
                </header>
                <p>{{ $article->brief }} <a href="{{ url('news') }}/{{ $article->slug }}">Read more</a></p>
            </section>
        @endforeach
    </div>

    @if(sizeof($categories) > 0)
        <nav class="news-categories">
            <ul>
                @foreach($categories as $category)
                    <li><a href="{{ url('category') }}/{{ $category->name }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </nav>
    @endif

    <div class="pager">
        {!! $articles->render() !!}
    </div>
@endsection
