<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use \DateTime;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($date)
    {
        return view('events.create', compact('date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Since all new events will start and end at same time by default:
        if($request->start === $request->end):

            $event = new Event();
            $event->title = $request->title;
            $event->description = $request->description;
            $event->start = $request->start;
            //Can't create an event with start and end of same date
            $event->end = new DateTime($request->end);
            $event->end->modify("+24 hours");
            $event->backgroundColor = $request->backgroundColor;
                    
        endif;

        if($event->save()):
            return redirect()->route('events.index');
        else:
            return view('events.create_error');
        endif;  

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = event::findOrFail($id);
        return view('events.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event $event)
    {
        $event = Event::findOrFail($request->id)->update($request->all());
        //Was it an ajax POST request or standard form POST request? 
        if($request->ajax):
            return response()->json($event);
        else:
            return redirect()->route('events.index');
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->event_id; 
        $delete = Event::find($id);
        $delete->delete();
        return redirect()->route('events.index');
    }
}
