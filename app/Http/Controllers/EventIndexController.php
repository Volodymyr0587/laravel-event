<?php

namespace App\Http\Controllers;

use App\Models\Event;


class EventIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $events = Event::with('country', 'tags')->orderBy('created_at', 'desc')->paginate(4);
        return view('eventIndex', compact('events'));
    }
}
