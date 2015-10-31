@extends('layouts.main')
@section('title', 'Hertfordshire Law Society')
@section('header')
      <div class="hero">
        <h2>Hertfordshire Law Society</h2>
        <h1>Supporting Solicitors Across Hertfordshire</h1>
        <a class="become-a-member-button" href="become-a-member">Become a member</a>
        <p class="member-benefits">Member benefits</p> 
        <ul>
          <li>CPD training</li>
          <li>Up-to-date local legal news</li>
          <li>Social activities</li>
        </ul>
      </div>
@endsection

@section('main')
    <div class="container">

      <div class="news">
        <h3>News</h3>

        @foreach($articles as $article)
          <section>
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

      <div class="in-numbers">
        <h3>In Numbers</h3>
        
        <div class="box">
          <div class="row">
            <div class="number">400</div>
            <div class="text">HLS has more than 400 members including employed solicitors, sole practitioners, firms specialising in particular areas of law, firms carrying on general practice, substantial regional firms, and firms with international connections. As a result, the range and breadth of expertise of its members for both the private and business client is extensive.</div>
          </div>

          <div class="row">
            <div class="number">1883</div>
            <div class="text">We’ve been opperating for over 130 years! Lorem ipsum dolor sit amet, consectetur adipisicing elit. At neque provident beatae molestiae maiores similique, reprehenderit adipisci! Libero, reiciendis quam.</div>
          </div> 
        </div>
      </div>

    </div>
@endsection
