@extends('layouts.main')
@section('title', 'Hertfordshire Law Society - Events and Training')
@section('head')
    <script src="{{ asset('js/vendor/angular.min.js') }}"></script>
    <script src="{{ asset('js/vendor/angular-ui-router.min.js') }}"></script>
    <script src="{{ asset('js/events-and-training.js') }}"></script>
@endsection
@section('main')
    <div ng-app ng-controller="eventsAndTraining">
        <h1>Events <span class="amp">&amp;</span> Training</h1>
        <nav class="events-nav">
            <ul>
                <li><a ui-sref="all" class="e-and-t-button">All</a></li>
                <li><a ui-sref="training" class="e-and-t-button">Training</a></li>
                <li><a ui-sref="events" class="e-and-t-button">Events</a></li>
                <li><a ui-sref="pastevents" class="e-and-t-button">Past Events</a></li>
            </ul>
        </nav>


        <div ui-view class="events">
            <section>
                <header>
                    <img src="http://lorempixel.com/441/337/city" alt="placeholder">
                    <h4>An event</h4>
                    <p><span>xx/xx/xx</span><a href="events-and-training/a-category">A category</a></p>
                </header>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Repellendus nulla iure totam, cum labore culpa quisquam libero natus quae voluptate. Et rerum officia nihil reprehenderit dolorem quidem doloribus, dolorum assumenda. <a href="single/a-news-item">Read More</a></p>
            </section>

            <section>
                <header>
                    <img src="http://lorempixel.com/440/337/business" alt="placeholder">
                    <h4>An event</h4>
                    <p><span>xx/xx/xx</span><a href="events-and-training/a-category">A category</a></p>
                </header>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Repellendus nulla iure totam, cum labore culpa quisquam libero natus quae voluptate. Et rerum officia nihil reprehenderit dolorem quidem doloribus, dolorum assumenda. <a href="single/a-news-item">Read More</a></p>
            </section>

            <section>
                <header>
                    <img src="http://lorempixel.com/441/337/business" alt="placeholder">
                    <h4>An event</h4>
                    <p><span>xx/xx/xx</span><a href="events-and-training/a-category">A category</a></p>
                </header>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Repellendus nulla iure totam, cum labore culpa quisquam libero natus quae voluptate. Et rerum officia nihil reprehenderit dolorem quidem doloribus, dolorum assumenda. <a href="single/a-news-item">Read More</a></p>
            </section>

            <section>
                <header>
                    <img src="http://lorempixel.com/440/337/city" alt="placeholder">
                    <h4>An event</h4>
                    <p><span>xx/xx/xx</span><a href="events-and-training/a-category">A category</a></p>
                </header>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Repellendus nulla iure totam, cum labore culpa quisquam libero natus quae voluptate. Et rerum officia nihil reprehenderit dolorem quidem doloribus, dolorum assumenda. <a href="single/a-news-item">Read More</a></p>
            </section>



        </div>
    </div>
@endsection
