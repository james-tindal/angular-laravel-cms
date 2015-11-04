<?php namespace HLS\Http\Controllers;


use Carbon\Carbon;
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
        $events = Event::latest('event_date')
            ->where('training', false)->paginate(4);

        foreach($events as $event) {
            $event->date = $event->event_date->format('d-m-Y');
        }


        return view('pages.events-and-training', compact('events'));
    }

    public function training()
    {
        $events = Event::latest('event_date')
            ->where('event_date', '>=', Carbon::Now())
            ->where('training', true)->get();
        $events->each(function($event) {
            $event->date = $event->event_date->format('d-m-Y');
        });

        return view('pages.events-and-training', compact('events'));
    }

    public function events()
    {
        $events = Event::latest('event_date')
            ->where('event_date', '>=', Carbon::Now())
            ->where('training', false)->get();
        $events->each(function($event) {
            $event->date = $event->event_date->format('d-m-Y');
        });

        return view('pages.events-and-training', compact('events'));
    }

    public function pastEvents()
    {
        $events = Event::latest('event_date')
            ->where('event_date', '<=', Carbon::Now())
            ->where('training', false)->get();
        $events->each(function($event) {
            $event->date = $event->event_date->format('d-m-Y');
        });

        return view('pages.events-and-training', compact('events'));
    }

    public function event($slug)
    {
        $event = Event::findBySlugOrFail($slug);
        $event->date = $event->event_date->format('d-m-Y');

        return view('pages.event', compact('event'));
    }

}