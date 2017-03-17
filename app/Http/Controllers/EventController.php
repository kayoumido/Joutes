<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     *
     * @author Doran Kayoumi
     */
    public function index(Request $request) {

        $events = Event::all();

        // check is it's an api request
        if ($request->is('api/*')) {
            return $events;
        }
        
        return view('event.index')->with('events', $events);

    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * @author Doran Kayoumi
     */
    public function show(Request $request, $id) {

        // check is it's an api request
        if ($request->is('api/*')) {
            return Event::findOrFail($id);
        }

        return true;
    }

    
}
