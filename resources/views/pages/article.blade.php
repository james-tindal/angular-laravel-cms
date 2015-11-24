@extends('layouts.main')
@section('title', 'Hertfordshire Law Society - ' . $title)
@section('main')

    <h1>{{ $title }}</h1>

    <div class="latest-news">
        {!! $image !!}
        <header>
            <p>
                <span {!! $withCategories !!}>{{ $published_at->format('d-m-Y') }}</span>
                {!! $categories !!}
            </p>
        </header>
        {{ $content }}
    </div>

    <div class="related-articles">
        <h3>Related articles</h3>
        @foreach($related as $a)
            <div class="related-article">
                <span>{{ $a->published_at->format('jS F Y') }}</span>
                <p><a href="{{ url('news/' . $a->slug) }}">{{ $a->title }}</a></p>
            </div>
        @endforeach
    </div>
@endsection
