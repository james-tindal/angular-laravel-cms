@extends('layouts.main')
@section('title', 'Hertfordshire Law Society - ' . $category)
@section('main')
    <div class="container">
      <div class="news">
        <h1>{{ $category }}</h1>
        @foreach($articles as $article)
          <section>
            <header>
                <h4>{{ $article->title }}</h4>
                <p><span>{{ $article->date }}</span><a href="category/a-category">A category</a></p>
            </header>
            <p>{{ $article->brief }} <a href="single/a-news-item">Read More</a></p>
          </section>
        @endforeach
      </div>
    </div>
@endsection