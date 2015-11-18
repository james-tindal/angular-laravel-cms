<?php namespace HLS\Http\Controllers;


use HLS\Event;

class Events extends Controller
{
    /**
     * Display Events And Training view
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::index();

        return view('pages.events-and-training', compact('events'));
    }

    public function training()
    {
        $events = Event::training();

        return view('pages.events-and-training', compact('events'));
    }

    public function events()
    {
        $events = Event::events();

        return view('pages.events-and-training', compact('events'));
    } 

    public function pastEvents()
    {
        $events = Event::past();

        return view('pages.events-and-training', compact('events'));
    }

    public function event($slug)
    {
        $event = Event::findBySlugOrFail($slug);

        return view('pages.event', compact('event'));
    }

}