@extends('layouts.main')
@section('title', 'Hertfordshire Law Society - ' . $event->title)
@section('main')

    <h1>{{ $event->title }}</h1>

    <div class="latest-news">
        @unless (is_null($event->image_url))
            <img src="{{ $event->image_url }}" alt="">
        @endunless
        <header>
            <p>
                <span>{{ $event->date }}</span>
                {{--<span @if(sizeof($event->categories) > 0)class="with-categories"@endif>{{ $event->date }}</span>--}}
                {{--@foreach($event->categories as $category)--}}
                    {{--<a href="{{ url('event-category') }}/{{ $category->name }}">{{ $category->name }}</a>,--}}
                {{--@endforeach--}}
            </p>
        </header>
        {{ $event->extended }}
    </div>

@endsection
