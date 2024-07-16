@extends('layouts.main')
@section('title', 'Hertfordshire Law Society - News')
@section('main')

    <h1>Latest News</h1>

    <div class="latest-news">
        @foreach($articles as $article)
            @include('partials.article')
        @endforeach
    </div>

    @if($categoryList)
        <nav class="news-categories">
            <ul>
                @foreach($categoryList as $category)
                    <li><a href="category/{{ $category }}">{{ $category }}</a></li>
                @endforeach
            </ul>
        </nav>
    @endif

    <div class="pager">
        {!! $articles->render() !!}
    </div>
@endsection
