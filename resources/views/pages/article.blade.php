@extends('layouts.main')
@section('title', 'Hertfordshire Law Society - ' . $article->title)
@section('main')

    <h1>{{ $article->title }}</h1>

    <div class="latest-news">
        @unless (is_null($article->image_url))
            <img src="{{ $article->image_url }}" alt="">
        @endunless
        <header>
            <p>
                <span @if(sizeof($article->categories) > 0)class="with-categories"@endif>{{ $article->date }}</span>
                @foreach($article->categories as $category)
                    <a href="{{ url('category') }}/{{ $category->name }}">{{ $category->name }}</a>,
                @endforeach
            </p>
        </header>
        {{ $article->extended }}
    </div>

    <div class="related-articles">
        <h3>Related articles</h3>
        @foreach($related as $rel)
            <div class="related-article">
                <span>{{ $rel->date }}</span>
                <p><a href="{{ url('news') }}/{{ $rel->slug }}">{{ $rel->title }}</a></p>
            </div>
        @endforeach
    </div>
@endsection
