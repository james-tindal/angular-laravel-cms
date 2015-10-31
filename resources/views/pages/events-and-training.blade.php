@extends('layouts.main')
@section('title', 'Hertfordshire Law Society - Events and Training')
@section('main')
      <h1>Events <span class="amp">&amp;</span> Training</h1>
      <nav class="events-nav">
        <ul>
          <li><a href="{{ url('events-and-training') }}" class="e-and-t-button">All</a></li>
          <li><a href="{{ url('training') }}" class="e-and-t-button">Training</a></li>
          <li><a href="{{ url('events') }}" class="e-and-t-button">Events</a></li>
          <li><a href="{{ url('past-events') }}" class="e-and-t-button">Past Events</a></li>
        </ul>
      </nav>


      <div class="events">
          @foreach($events as $event)
              <section>
                  @unless (is_null($event->image_url))
                      <aside>
                          <img src="{{ $event->image_url }}" alt="">
                      </aside>
                  @endunless
                  <header>
                      <h4>{{ $event->title }}</h4>

                      <p>
                          <span>{{ $event->date }}</span>
                          {{--<span @if(sizeof($event->categories) > 0)class="with-categories"@endif>{{ $event->date }}</span>--}}
                          {{--@foreach($event->categories as $category)--}}
                              {{--<a href="{{ url('category') }}/{{ $category->name }}">{{ $category->name }}</a>,--}}
                          {{--@endforeach--}}
                      </p>
                  </header>
                  <p>{{ $event->brief }} <a href="{{ url('events') }}/{{ $event->slug }}">Read more</a></p>
              </section>
          @endforeach
      </div>
@endsection
