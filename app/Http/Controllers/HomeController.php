<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use App\Models\EventDay;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $eventData = [
            'title' => 'AISS 2025 - Annual Information Security Summit',
            'date' => 'December 4-6, 2025',
            'venue' => 'Pullman & Novotel, Aerocity, New Delhi',
            'hashtags' => ['#AISS2025', '#CyberSecurity', '#DSCI'],
        ];

        $speakers = Speaker::orderBy('order')->get();

        $eventDays = EventDay::with(['agendas' => function ($query) {
            $query->orderBy('start_time')->with('speakers');
        }])->orderBy('day_number')->get();

        return view('home', compact('eventData', 'speakers', 'eventDays'));
    }

    /**
     * Display the about page.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Display the speakers page.
     *
     * @return \Illuminate\View\View
     */
    public function speakers()
    {
        $speakers = Speaker::orderBy('order')->get();

        return view('speakers', compact('speakers'));
    }
}
