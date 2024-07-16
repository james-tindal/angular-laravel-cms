@extends('layouts.main')
@section('title', 'Hertfordshire Law Society - ' . $name)
@section('main')
    <h1>{{ $name }}</h1>
    <div class="latest-news">
        @foreach($articles as $article)
            @include('partials.article')
        @endforeach
    </div>

    @if($categories)
        <nav class="news-categories">
            <ul>
                @foreach($categories as $category)
                    <li><a href="/category/{{ $category->slug }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
        </nav>
    @endif
@endsection